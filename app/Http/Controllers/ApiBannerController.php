<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class ApiBannerController extends Controller
{

    public function index()
    {
        $slider = Slider::select('title', 'image_mobile')->where('status', '1')->orderBy('updated_at','desc')->get();
        return response()->json([
            "status"=>"success",
            "message"=>"Banner berhasil ditampilkan",
            "results"=> $slider
         ],200);
    }

}
