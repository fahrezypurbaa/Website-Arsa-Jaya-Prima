<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Schedule;

class ApiScheduleController extends Controller
{
    public function index($type) {
        $documents = Document::where("type","=", $type)->first();
        return response()->json([
            "status" => "success",
            "message" => "Jadwal berhasil ditampilkan",
            "result" =>  $documents,
        ], 200);
    }

    public function show($id){
        $schedule =  Schedule::select('name', 'image','training_id','start_date','end_date','is_open')->with('training')->where('training_id','=', $id)->orderBy('start_date','asc')->first();
        return response()->json([
            "status" => "success",
            "message" => "Jadwal berhasil ditampilkan",
            "result" =>  $schedule,
        ],200);
    }
}
