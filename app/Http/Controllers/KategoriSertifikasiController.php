<?php

namespace App\Http\Controllers;

use App\Models\KategoriSertifikasi;
use App\Models\TrainingCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriSertifikasiController extends Controller
{
    public function index()
    {
        $kategori = KategoriSertifikasi::with('kategori')->get();
        return view('dashboard.categoriesSertifikasi.index', [
            "title" => "Kategori",
            "kategori" => $kategori
        ]);
    }


    public function create()
    {
        $trainingcategories = TrainingCategories::all();
        $status = ['1', '0'];
        return view('dashboard.categoriesSertifikasi.create', [
            'title' => "Tambah Program Pelatihan dan Pembinaan",
            'trainingcategories' => $trainingcategories
        ], compact('status', 'trainingcategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'img_kategori' => 'image|file|mimes:webp|required',
            'training_categories_id'   =>  'required'
        ]);

        if ($request->file('img_kategori')) {
            $validatedData['img_kategori'] = $request->file('img_kategori')->store('training-_kategori_sertifikasi');
        }

        KategoriSertifikasi::create($validatedData);
        return redirect('/dashboard/kategoriSertifikasi')->with('success', 'Kategori Baru baru berhasil ditambahkan!');
    }


    public function edit(KategoriSertifikasi $kategoriSertifikasi)
    {
        return view('dashboard.categoriesSertifikasi.edit', [
            'title' => "Edit Program Pelatihan dan Pembinaan",
            'kategori' => $kategoriSertifikasi,
            'trainingcategories' => TrainingCategories::all()
        ]);
    }

    public function update(Request $request, KategoriSertifikasi $kategoriSertifikasi)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
            'img_kategori' => 'image|file|mimes:webp',
            'training_categories_id'   =>  'required'
        ]);

        if ($request->file('img_kategori')) {
            if ($request->oldimg_kategori) {
                Storage::delete($request->oldimg_kategori);
            }
            $validatedData['img_kategori'] = $request->file('img_kategori')->store('training-_kategori_sertifikasi');
        }
        KategoriSertifikasi::where('id', $kategoriSertifikasi->id)
            ->update($validatedData);
        return redirect('/dashboard/kategoriSertifikasi')->with('success', 'Kategori Baru baru berhasil diupdate!');
    }

    public function destroy(KategoriSertifikasi $kategoriSertifikasi)
    {
        $kategoriSertifikasi->delete();
        return redirect('/dashboard/kategoriSertifikasi')->with('success', 'Kategori Baru baru berhasil dihapus!');
    }
}
