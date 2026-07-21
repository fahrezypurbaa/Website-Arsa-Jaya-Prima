<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ApiPerusahaanController extends Controller
{
   
    public function index()
    {
        //
    }

 
    public function create(Request $request)
    {
        $validationPerusahaan = Validator::make($request->all(),[
            'nama_perusahaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',
            'contact' => 'required|string',
            'logo' => 'required|image'
        ]);
        if($validationPerusahaan->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>$validationPerusahaan->errors()
            ],422);
        }
        if ($request->file('logo')) {
            $picturePath = $request->file('logo')->store('logo_perusahaan');
            $validatedData['logo'] = $picturePath;
        }
        $perusahaan = Perusahaan::create($validatedData);
        return response()->json([
            'status' => 'success',
            'message' => 'Perusahaan berhasil disimpan',
            'result' => $perusahaan
        ],200);
    }

    

    public function update(Request $request, string $id)
    {
        $validationPerusahaan = Validator::make($request->all(),[
            'contact' => 'required|string',
            'logo' => 'required|image'
        ]);
        $validated = $validationPerusahaan->validate();
        $perusahaan = Perusahaan::find($id)->first();
        
        if($validationPerusahaan->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>$validationPerusahaan->errors()
            ],422);
        }
        if ($request->file('logo')) {
            $picturePath = $request->file('logo')->store('logo_perusahaan');
        }
        if($perusahaan){
            $perusahaan->logo = $picturePath;
            $perusahaan->contact =  $request->contact;
            $perusahaan->update();
            return response()->json([
                'status' => 'success',
                'message' => 'Perusahaan berhasil diperbarui',
                'result' => $perusahaan
            ],200);
        } 
    }
}
