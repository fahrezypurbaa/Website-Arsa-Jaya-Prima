<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class ApiPesertaController extends Controller
{
    public function index()
    {  
        $peserta = Pelatihan::select('pelatihans.id','pelatihans.role','users.username','users.no_telp','trainings.name as training_name')->join('users','users.id','=','pelatihans.user_id')->join('trainings','trainings.id','=','pelatihans.training_id')->get();
        return response()->json([
            'status'=>'success',
            'message'=> 'Peserta pelatihan berhasil ditampilkan',
            'results' => $peserta
        ],200);
    }

    public function show($id)
    {
        $peserta= Pelatihan::select('pelatihans.id','users.id as user_id','users.username','pelatihans.role','users.no_telp','trainings.name as training_name')->join('users','users.id','=','pelatihans.user_id')->join('trainings','trainings.id','=','pelatihans.training_id')->where('pelatihans.id','=', $id)->first();
        if($peserta){
            return response()->json([
                'status'=>'success',
                'message'=> 'Peserta pelatihan berhasil ditampilkan',
                'result' => $peserta
            ],200);
        }else{
            return response()->json([
                'status'=>'error',
                'error'=> 'Peserta tidak ditemukan',
            ],404);
        }
    }
    

    
    public function update(Request $request, $id)
    {
        $rules = [
            'role' => 'required'
        ];

        $validatedData = $request->validate($rules);

        try {
            $peserta = Pelatihan::find($id);

            if (!$peserta) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Peserta tidak ditemukan',
                ], 404);
            }

            $peserta->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Peserta pelatihan berhasil diupdate',
                'result' => $peserta
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memperbarui peserta',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy(string $id)
    {
        $peserta = Pelatihan::where('id', $id);
        $peserta->delete();
        if($peserta == null){
            return response()->json([
                'status'=>'success',
                'message'=> 'Peserta pelatihan berhasil dihapus',
            ],200);
        }else{
            return response()->json([
                'status'=>'error',
                'error'=> 'Peserta tidak ditemukan',
            ],404);
        }
      
    }
}
