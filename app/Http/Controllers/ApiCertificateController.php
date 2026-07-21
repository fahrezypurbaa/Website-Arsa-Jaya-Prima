<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class ApiCertificateController extends Controller
{
    public function index(Request $request) {
        $token = $request->bearerToken();
        if($token){
            $keyword = $request->search;
            $certificate =  Certificate::where('name', $keyword)->orWhere('certificate', $keyword)->get();
            if(count($certificate)>0){
                return response()->json([
                    "status"=>"success",
                    "message"=>"Sertifikat berhasil ditampilkan",
                    "result"=> $certificate,
                 ],200);
            }else{
                return response()->json([
                    "status"=>"error",
                    "message"=>"Sertifikat tidak ditemukan"
                ],404);
            }
           
        }
    }
}
