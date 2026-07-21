<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\KontakPembayaran;
use App\Models\Training;
use App\Models\Pelatihan;
use App\Models\Pembayaran;
use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Schedule;
use App\Notifications\OrderNotification;
use App\Notifications\UploadNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class ApiRegistrasiController extends Controller
{
    public function getKategori(Request $request)
    {
        $nama_training = $request->nama_training;
        $trainings =  Training::select('trainings.id', 'trainings.name')
            ->join('training_categories', 'training_categories.id', '=', 'trainings.training_categories_id')->where('training_categories.name', $nama_training)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Training berhasil ditampilkan',
            'results' => $trainings
        ], 200);
    }
    
    public function getBerkas()
    {
        $berkas = Berkas::where('user_id', '=', auth()->guard('api')->user()->id)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Berkas berhasil ditampilkan',
            'results' => $berkas
        ], 200);
    }
    // Create user for pelatihan
    public function pendaftaranKelasPribadi(Request $request)
    {
        // pendaftaran user (pendaftar)
        $validationPendaftaranKelas = Validator::make($request->all(), [
            'training_id' => 'required|integer',
        ]);
        if ($validationPendaftaranKelas->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validationPendaftaranKelas->errors()
            ], 422);
        }
        $validatedDataKelas = $validationPendaftaranKelas->validated();
        $validatedDataKelas['user_id'] =  Auth()->user()->id;
        // cek pengguna
        $userProgram = Pelatihan::where('user_id','=',auth()->user()->id)->where('training_id','=',$request->training_id)->first();
        if($userProgram){
            return response()->json([
                'status' => 'error',
                'error' => 'Pengguna sudah terdaftar di program ini'
            ], 403);
        }
         // cek jadwal
        $jadwal = Schedule::where('training_id',$request->training_id)->first();
        if($jadwal){
            $validatedDataKelas['tanggal_mulai'] = $jadwal->start_date;
            $validatedDataKelas['tanggal_selesai'] = $jadwal->end_date;
        }
        $pelatihan = Pelatihan::create($validatedDataKelas);
        $pelatihanTraining = Training::where('id',$pelatihan->training_id)->first();
        $user = User::where('id',auth()->user()->id)->first();
        $message =  "Anda berhasil terdaftar di pelatihan {{$pelatihanTraining->name}}";
        $user->notify(new OrderNotification(auth()->user()->id, $pelatihan->id, $pelatihan->training_id,$message));
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'result' => $pelatihan
        ], 200);
    }

    public function pendaftaranKelasPerusahaan(Request $request)
    {
         // pendaftaran perusahaan
         $validationPerusahaan = Validator::make($request->all(),[
            'nama_perusahaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',
        ]);

        // cek ketersediaan perusahaan
        if ($validationPerusahaan->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validationPerusahaan->errors()
            ], 422);
        }

        $validatedDataPerusahaan = $validationPerusahaan->validate();
        $validatedDataPerusahaan['koordinator_id'] = Auth()->user()->id;
        // menghilangkan duplikat perusahaan
        $cekPerusahaan = Perusahaan::where('nama_perusahaan', $request->nama_perusahaan);
        if(!$cekPerusahaan){
            $perusahaan = Perusahaan::create($validatedDataPerusahaan);
        }
        // update user to koordinator
        $user = User::find(Auth()->user()->id);
        $user->role = "koordinator";
        $user->update();

        // Adding new User 
        $validationUser = Validator::make($request->all(), [
            'username' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|email:dns|unique:users',
        ]);
        if ($validationUser->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validationUser->errors()
            ], 422);
        }
        $validatedData = $validationUser->validated();
        $validatedData['role'] = 'peserta';
        $perusahaan = Perusahaan::where('koordinator_id', Auth()->user()->id)->first();

        if ($perusahaan) {
            $validatedData['perusahaan_id'] = $perusahaan->id;
        } else {
            $validatedData['perusahaan_id'] = null; 
        }
       
        function generateRandomPassword()
        {
            $random_characters = 2;
            $lower_case = "abcdefghijklmnopqrstuvwxyz";
            $upper_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $numbers = "1234567890";
            $symbols = "!@#$%^&*";
            $lower_case = str_shuffle($lower_case);
            $upper_case = str_shuffle($upper_case);
            $numbers = str_shuffle($numbers);
            $symbols = str_shuffle($symbols);
            $random_password = substr($lower_case, 0, $random_characters);
            $random_password .= substr($upper_case, 0, $random_characters);
            $random_password .= substr($numbers, 0, $random_characters);
            $random_password .= substr($symbols, 0, $random_characters);
            return  str_shuffle($random_password);
        }
        $password_otomatis = generateRandomPassword();
        $validatedData['password_otomatis'] = $password_otomatis;
        $validatedData['password'] = Hash::make($password_otomatis);
        // make idUser 
        function generateNumericId($length=4){
            $uuid='';
            for($i=0;$i<$length; $i++){
                $uuid.=mt_rand(0,9);
            }
            return $uuid;
        }
        // make user for pelatihan
        $randomId = rand(10,100);
        $validatedData['id'] = $randomId;
        $pendaftar = User::create($validatedData);
        auth()->user()->getAccount($validatedData['email']);
        $validationPelatihan = Validator::make($request->all(), [
            'training_id' => 'required|integer',
            'user_id' => 'integer'
        ]);
        if ($validationPelatihan->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validationPelatihan->errors()
            ], 422);
        }
        // find user 
        $userRegisters = User::where('id','=',$pendaftar->id)->first();
        $validatedData = $validationPelatihan->validated();
        $validatedData['user_id'] = $userRegisters->id;
        $pelatihan = Pelatihan::create($validatedData);
    
        $pelatihanTraining = Training::where('id',$pelatihan->training_id)->first();
        $user = User::where('id',auth()->user()->id)->first();
        $message =  "Anda berhasil terdaftar di pelatihan {{$pelatihanTraining->name}}";
        $user->notify(new OrderNotification(auth()->user()->id,$pelatihan->id,$pelatihan->training_id,$message));
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'result' => $pelatihan
        ], 200);
    }

    public function pembayaran(Request $request)
    {
        $validationPembayaran = Validator::make($request->all(), [
            'pelatihan_id' => 'required|integer',
            'bukti_pembayaran' => 'required|image|file'
        ]);
        if ($validationPembayaran->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validationPembayaran->errors()
            ], 422);
        }
        $validatedData = $validationPembayaran->validated();
        $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('pelatihan-_buktiPembayaran');
        $pembayarans = Pembayaran::select(
            'pembayarans.id as pembayaran_id',
            'users.username',
            'trainings.name as program_pelatihan',
            'pembayarans.status',
            'pembayarans.bukti_pembayaran'
        )
        ->join('pelatihans', 'pelatihans.id', '=', 'pembayarans.pelatihan_id')
        ->join('users', 'users.id', '=', 'pelatihans.user_id')
        ->join('trainings', 'trainings.id', '=', 'pelatihans.training_id')
        ->where('pembayarans.status', '=', 'lunas')
        ->where('pembayarans.pelatihan_id','=', $request->pelatihan_id)
        ->get();
        
        if ($pembayarans) {
            return response()->json([
                'error' => 'Pembayaran sudah lunas',
            ], 403);
        }
        
        return response()->json([
            'status' => 'success',
            'data' => $pembayarans,
        ], 200);
        
        $pembayaran = Pembayaran::create($validatedData);
        return response()->json([
            'status' => 'success',
            'message' => 'Pembayaran berhasil ditambahkan',
            'result' => $pembayaran
        ], 200);
    }

    public function informasi($id) {
       $peserta = Pelatihan::join('users', 'users.id', '=', 'pelatihans.user_id')
            ->join('trainings', 'trainings.id', '=', 'pelatihans.training_id')
            ->select('trainings.id','pelatihans.id','trainings.pricelist','trainings.name','users.username')
            ->where('pelatihans.id',$id)
            ->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Peserta berhasil ditampilkan',
            'result' => $peserta
        ]);
    }

    public function uploadBerkas(Request $request){
        if ($request->hasFile('berkas_file')) {
            $uploadedFiles = $request->file('berkas_file');
            $userId = Auth()->user()->id;
            $berkasArray = [];    
            foreach ($uploadedFiles as $file) {
                $berkasPath = $file->store('user_berkas');
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $berkas = Berkas::create([
                    'user_id' => $userId,
                    'berkas_file' => $berkasPath,
                    'filename' => $filename,
                    'pelatihan' => $request['pelatihan']
                ]);
                $berkasArray[] = $berkas;
            }
            //notifikasi pembayaran hanya di koordinator
            $user = User::where('id',Auth()->user()->id)->first();
            $user->notify(new UploadNotification($user->id));
            return response()->json([
                'user' => $user,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User berhasil terdaftar di pelatihan',
                'result' => ['berkas' => $berkasArray]
            ], 200);
        }
    }
}
