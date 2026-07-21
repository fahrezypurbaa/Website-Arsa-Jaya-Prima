<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiLokerController extends Controller
{
    public function index(){
        $lokers = Loker::take(6)->get();
        return response()->json([
            'status'=>'success',
            'message'=>'Loker berhasil ditampilkan',
            'results'=>$lokers
        ]);
    }
    public function create(Request $request)
    {
        $validationLoker = Validator::make($request->all(),[
            'perusahaan_id' => 'required|string',
            'posisi'=>'required|string',
            'gaji' => 'required|int',
            'persyaratan' => 'required|string',
            'end_date' => 'required|date',
            'deskripsi' => 'required|string'
        ]);
        if($validationLoker->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>$validationLoker->errors()
            ],422);
        }
        $validated = $validationLoker->validate();
        $loker = Loker::create($validated);
        return response()->json([
            'status'=>'success',
            'message'=>'Loker berhasil ditambahkan',
            'result'=>$loker
        ]);
    }
    public function show(Loker $loker)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Loker berhasil ditampilkan',
            'result' => $loker
        ],200);
    }
}
