<?php

namespace App\Http\Controllers;
use App\Models\Training;
use App\Models\Post;

class ApiSearchController extends Controller
{
    public function index()
    {
        $trainings = Training::latest()->filter(request(['search']))->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Program ditemukan',
            'results' => $trainings
        ],200);
    }

    public function pencarianArtikel(){
        $posts = Post::latest()->filter(request(['search']))->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Artikel ditemukan',
            'results' => $posts
        ],200);
    }
    
    public function pencarianLoker()
    {
        $search = request('search');
        $lokers = Loker::latest()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%'); 
            })
            ->get();
        return response()->json([
            'message' => 'Artikel ditemukan',
            'results' => $lokers
        ], 200);
    }
}
