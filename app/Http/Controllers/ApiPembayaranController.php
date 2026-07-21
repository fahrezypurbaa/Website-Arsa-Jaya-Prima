<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Pembayaran;
use App\Models\Pelatihan;
use App\Models\User;
use App\Notifications\PembayaranNotification;
use Illuminate\Http\Request;

class ApiPembayaranController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
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
            'pembayarans.status',
            'pembayarans.bukti_pembayaran'
        )
            ->join('pelatihans', 'pelatihans.id', '=', 'pembayarans.pelatihan_id')
            ->join('users', 'users.id', '=', 'pelatihans.user_id')
            ->where('pembayarans.status', '=', 'lunas')
            ->where('pembayarans.pelatihan_id', '=', $request->pelatihan_id)
            ->get();
        if ($pembayarans->count() > 0) {
            return response()->json([
                'error' => 'Pembayaran sudah lunas',
            ], 403);
        } else {
            $pembayaran = Pembayaran::create($validatedData);
            $user = User::find(Auth()->user()->id);
            $program =  Pelatihan::select('trainings.name')->join('trainings','trainings.id','=','pelatihans.training_id')->where('pelatihans.id', $request->pelatihan_id)->first();
            $message =  "Pembayaran program {$program->name} Berhasil!";
            $user->notify(new PembayaranNotification(auth()->user()->id, $request->pelatihan_id, $pembayaran->id, $message));
            return response()->json([
                'status' => 'success',
                'message' => 'Pembayaran berhasil ditambahkan',
                'result' => $pembayaran
            ], 200);
        }
    }

    public function show($id)
    {
       $pembayaran = Pembayaran::where('pelatihan_id', $id)
            ->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Data pembayaran berhasil ditampilkan',
            'result' => $pembayaran
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
