<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pelatihan;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class ApiAbsensiController extends Controller
{
    public function userAbsensi(){
        $getId = Auth()->user()->id;
        // find user
        $user = User::where('users.id',$getId)
        ->first();
        $nama_lengkap = $user->username;
        $kelas_yang_diikuti = Pelatihan::where('user_id','=',$getId)
        ->select('trainings.name', 'pelatihans.id','trainings.id as training_id')
        ->join('trainings', 'trainings.id', '=', 'pelatihans.training_id')
        ->join('training_categories','training_categories.id','=','trainings.training_categories_id')
        ->get();
        $instansi_perusahaan = $user->nama_perusahaan;
        return response()->json([
            'status' => 'success',
            'message' => 'Data peserta berhasil ditampilkan',
            'result' => [
                    "nama_lengkap" => $user->username,
                    "kelas_yang_diikuti" => $kelas_yang_diikuti,
                    "instansi_perusahaan" => $instansi_perusahaan,
            ]
            ]);
    }
    public function create(Request $request)
    {
        // Getting User ID
        $getId = Auth()->user()->id;
        // find user
        $user = User::where('users.id',$getId)
        ->first();
        $nama_lengkap = $user->username;
        $kelas_yang_diikuti = Pelatihan::where('user_id','=',$getId)->get();
        $instansi_perusahaan = $user->nama_perusahaan;
        $validationAbsensi = Validator::make($request->all(),[
            'pelatihan_id' => '',
            'foto_absensi' => 'required|file',
            'is_confirmed' => 'required'
        ]);
        if ($validationAbsensi->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validationAbsensi->errors()
            ], 422);
        }
        $validatedData = $validationAbsensi->validated();
        if ($request->file('foto_absensi')) {
            $picturePath = $request->file('foto_absensi')->store('foto_absensi');
            $validatedData['foto_absensi'] = $picturePath;
        }
        $absensi = Absensi::create($validatedData);
        $cekJadwal = Schedule::join('pelatihans', 'pelatihans.training_id', '=', 'schedules.training_id')->where('pelatihans.id', $request->pelatihan_id)->first();
        if ($cekJadwal) {
            if ($cekJadwal->is_open == "Buka") {
                $absensi = Absensi::create($validatedData);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Absensi berhasil disimpan',
                    'result' => $absensi,
                    'jadwal' => $cekJadwal
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'error' => 'Presensi belum dibuka, presensi akan dibuka pada pukul 08.00'
                ], 403);
            }
        }
        else{
            return response()->json([
                'status' => 'error',
                'error' => 'Jadwal belum tersedia. Harap hubungi Admin'
            ], 403);
        }
    }
}
