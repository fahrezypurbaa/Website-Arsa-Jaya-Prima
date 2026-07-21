<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\KategoriSertifikasi;

class ApiSertifikasiController extends Controller
{
    public function index(string $id)
    {
        $trainings = Training::select('id','name','thumbnail')->where('training_categories_id', $id)->latest()->filter(request(['search', 'kategori']))->get();
        return response()->json([
            "status"=>"success",
            "message"=>"Training Berhasil ditampilkan",
            "results"=> $trainings
         ],200);
    }
    public function showKategori(string $id)
    {
        $kategori = KategoriSertifikasi::select('id', 'nama_kategori', 'training_categories_id')->where('training_categories_id', $id)->latest()->get();
        return response()->json([
            "status" => "success",
            "message" => "Kategori Training Berhasil ditampilkan",
            "results" => $kategori
        ], 200);
    }
    public function showSubKategori()
    {
        $subKategori = KategoriSertifikasi::all();
        return response()->json([
            "status" => "success",
            "message" => "Sub Kategori Berhasil ditampilkan",
            "results" => $subKategori
        ], 200);
    }
    public function show(string $id)
    {
        $trainings = Training::where('id', $id)->first();
        return response()->json([
            "status"=>"success",
            "message"=>"Detail training Berhasil ditampilkan",
            "result"=> $trainings
         ],200);
    }
}
