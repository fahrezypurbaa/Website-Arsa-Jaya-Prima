<?php

namespace App\Http\Controllers;
use App\Models\CustomerService;

class ApiKontakController extends Controller
{
    public function index()
    {
        $cs = CustomerService::where('status', '=', '1')->get();
        return response()->json([
            'status'=>'success',
            'message'=>'Customer Service berhasil ditampilkan',
            'results'=> $cs
        ],200);
    }

}
