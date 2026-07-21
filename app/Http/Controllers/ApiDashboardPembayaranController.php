<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class ApiDashboardPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::select('pembayarans.id as pembayaran_id', 'users.username', 'trainings.name as program_pelatihan', 'pembayarans.status', 'pembayarans.bukti_pembayaran')->join('pelatihans', 'pelatihans.id', '=', 'pembayarans.pelatihan_id')->join('users', 'users.id', '=', 'pelatihans.user_id')->join('trainings', 'trainings.id', '=', 'pelatihans.training_id')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Pembayaran pelatihan berhasil ditampilkan',
            'results' => $pembayaran
        ], 200);
    }

    public function show(string $id)
    {
        $pembayaran = Pembayaran::select('pembayarans.id as pembayaran_id','users.username','trainings.name as program_pelatihan','pembayarans.status','pembayarans.bukti_pembayaran')->join('pelatihans','pelatihans.id','=','pembayarans.pelatihan_id')->join('users','users.id','=','pelatihans.user_id')->join('trainings','trainings.id','=','pelatihans.training_id')->where('pembayarans.id','=',$id)->first();

        if ($pembayaran) {
            return response()->json([
                'status' => 'success',
                'message' => 'Pembayaran pelatihan berhasil ditampilkan',
                'result' => $pembayaran
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Pembayaran tidak ditemukan',
            ], 404);
        }
    }

    // public function update(Request $request, string $id)
    // {
    //     $rules = [
    //         'status' => 'required'
    //     ];
    //     $validatedData = $request->validate($rules);
    //     if ($request->status == 'Lunas') {
    //         Pelatihan::join('pembayarans', 'pembayarans.pelatihan_id', '=', 'pelatihans.id')
    //             ->where('pembayarans.pelatihan_id', $id)
    //             ->update(['pelatihans.role' => 'Peserta']);
    //     }
    //     $pembayaran = Pembayaran::where('id', $id)->update($validatedData);
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Pembayaran berhasil diupdate',
    //         'result' => $pembayaran
    //     ], 200);
    // }
     public function update(Request $request, string $id)
    {
        $rules = [
            'status' => 'required'
        ];
        $validatedData = $request->validate($rules);
        try {
            $pembayaran = Pembayaran::find($id);
            if (!$pembayaran) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'pembayaran tidak ditemukan',
                    'error'=>'pembayaran tidak ditemukan'
                ], 404);
            }
            if ($request->status == 'Lunas') {
                Pelatihan::join('pembayarans', 'pembayarans.pelatihan_id', '=', 'pelatihans.id')
                    ->where('pembayarans.pelatihan_id', $id)
                    ->update(['pelatihans.role' => 'Peserta']);
            }
            $pembayaran->update($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'pembayaran pelatihan berhasil diupdate',
                'result' => $pembayaran
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui pembayaran',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::where('id', $id);
        $pembayaran->delete();
        if ($pembayaran) {
            return response()->json([
                'status' => 'success',
                'message' => 'Pembayaran berhasil dihapus',
            ], 200);
        }
    }
}
