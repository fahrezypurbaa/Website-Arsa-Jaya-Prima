<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardGalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryCategory = GalleryCategory::all();

        return view('dashboard.gallerycategories.index', [
            'title' => 'Kategori Foto Galeri',
        ], compact('galleryCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallerycategories.create', [
            'title' => "Tambah Kategori Foto",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id'  =>  'required|unique:gallery_categories',
            'name' =>  'required|max:255',
        ]);

        GalleryCategory::create($validatedData);

        return redirect('/dashboard/gallery-categories')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $galleryCategory = GalleryCategory::findOrFail($id);
            GalleryCategory::destroy($galleryCategory->id);

            return redirect('/dashboard/gallery-categories')->with('success', 'Kategori berhasil dihapus!');
        } catch (Exception $e) {
            report($e);

            return back()->with('error', 'Kategori tidak dapat dihapus karena terdapat relasi dengan Foto Galeri, ubah Kategori pada Foto Galeri terlebih dahulu!');
        }
    }

    public function checkSlug(Request $request) {
        $id = SlugService::createSlug(GalleryCategory::class, 'id', $request->name);

        return response()->json(['id' => $id]);
    }
}
