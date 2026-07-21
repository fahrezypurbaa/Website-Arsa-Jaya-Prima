<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OngoingTraining;

class ApiOngoingController extends Controller
{

    public function index()
    {
       $trainings = OngoingTraining::join("trainings","trainings.id","=","ongoing_trainings.training_id")
       ->select('trainings.id','trainings.name','ongoing_trainings.image','ongoing_trainings.jumlah_peserta','trainings.platform','ongoing_trainings.start_date','ongoing_trainings.end_date')
       ->orderBy('ongoing_trainings.start_date', 'DESC')
       ->get();
       return response()->json([
        "status"=>"success",
        "message"=>"Training Berhasil ditampilkan",
        "results"=> $trainings
     ],200);
    }
}
