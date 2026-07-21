<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiArtikelController extends Controller
{
    public function index()
    {
        $artikel = Post::select('id','title','image','created_at','excerpt')->latest()->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil diperbarui',
            'results' => $artikel
        ],200);
    }
    public function show(string $id)
    {
        $artikel = Post::select('categories.id as kategoriId', 'categories.name as nama_kategori','categories.keywords as keywords','posts.*')
        ->join('categories','categories.id','=','posts.category_id')
        ->where('posts.id',$id)
        ->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil diperbarui',
            'result' => $artikel
        ],200);
    }

    public function kategori(string $id)
    {
        $artikel = Post::select('id','title','image','created_at','excerpt','body','keywords')
        ->with('kategori')
        ->where('id',$id)
        ->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Artikel berhasil diperbarui',
            'results' => $artikel
        ],200);
    }
}
