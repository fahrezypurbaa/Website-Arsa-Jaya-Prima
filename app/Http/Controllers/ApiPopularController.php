<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiPopularController extends Controller
{
    public function index()
    {
        $trainings = Training::join('schedules',"schedules.training_id","=","trainings.id")->select('trainings.id','trainings.name','trainings.thumbnail','schedules.start_date')->whereHas('schedule')->get();
        return response()->json([
            "status"=>"success",
            "message"=>"Training Berhasil ditampilkan",
            "results"=> $trainings
         ],200);
    }
    
    public function trainings(){
        $trainings = Training::select('id','name','thumbnail','deskripsi_persyaratan')->get();
        return response()->json([
            "status"=>"success",
            "message"=>"Training Berhasil ditampilkan",
            "results"=> $trainings
         ],200);
    }
}
