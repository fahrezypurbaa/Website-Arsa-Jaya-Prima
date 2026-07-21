<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\User;
use App\Notifications\UploadNotification;
use Illuminate\Http\Request;

class ApiBerkasController extends Controller
{
    public function getBerkas()
    {
        $berkas = Berkas::where('user_id', '=', auth()->guard('api')->user()->id)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Berkas berhasil ditampilkan',
            'results' => $berkas
        ], 200);
    }

    public function uploadBerkas(Request $request)
    {

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
            return response()->json([
                'status' => 'success',
                'message' => 'User berhasil mengunggah berkas',
            ], 200);
        }
    }
    public function show($id)
    {
        $berkas = Berkas::where('id', $id)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berkas berhasil ditampilkan',
            'resultBerkas' => $berkas
        ], 200);
    }
    public function delete($id)
    {
        $berkas = Berkas::find($id);
        if (!$berkas) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data berkas tidak ditemukan',
            ], 404);
        }
        $berkas->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berkas berhasil dihapus',
        ], 200);
    }

}
