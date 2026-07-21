<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;

class ApiDashboardBerkasController extends Controller
{
    // public function index()
    // {
    //     $berkas = Berkas::select('user_id', Berkas::raw('MAX(id) as id'), Berkas::raw('COUNT(*) as total_berkas'))
    //         ->with('user:id,name,username,email,no_telp')
    //         ->groupBy('user_id')
    //         ->get();
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Berkas berhasil ditampilkan',
    //         'results' => $berkas
    //     ], 200);
    // }
    
    public function index()
    {
        $berkas = Berkas::with('user')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Berkas berhasil ditampilkan',
            'results' => $berkas
        ], 200);
    }

    public function show(string $id)
    {

        $berkas = Berkas::where('id', '=', $id)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Berkas berhasil ditampilkan',
            'result' => $berkas
        ], 200);
    }

    public function destroy(string $id)
    {
        $berkas = Berkas::find($id);
        if (!$berkas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Berkas tidak ditemukan',
            ], 404);
        }

        $berkas->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berkas berhasil dihapus',
        ], 200);
    }
}
