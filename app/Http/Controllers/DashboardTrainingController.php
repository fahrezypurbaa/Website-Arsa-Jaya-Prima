<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\KategoriSertifikasi;
use App\Models\Place;
use App\Models\Training;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TrainingCategories;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

class DashboardTrainingController extends Controller
{
    public function index(Request $request)
    {
        $trainings = Training::where('id', '!=', '0')->get();
        $archives = Training::onlyTrashed()->where('id', '!=', '0')->get();
        return view('dashboard.trainings.index', [
            "title" => "Pelatihan dan Pembinaan",
        ], compact('trainings', 'archives'));
    }

    public function archive()
    {
        $trainings = Training::onlyTrashed()->where('id', '!=', '0')->get();
        return view('dashboard.trainings.archieve', [
            "title" => "Pelatihan dan Pembinaan",
        ], compact('trainings'));
    }

    public function create()
    {
        $trainingcategories = TrainingCategories::where('id', '!=', '4')->get();
        $status = ['1', '0'];
        return view('dashboard.trainings.create', [
            'title' => "Tambah Program Pelatihan dan Pembinaan",
            'trainingcategories' => $trainingcategories,
            'kategori_sertifikasi' => KategoriSertifikasi::all()
        ], compact('status', 'trainingcategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
             'training_categories_id'   =>  'required',
            'name' =>  'required|max:255',
            'kategori_sertifikasi' => 'required',
            'slug'  =>  'required|unique:trainings',
            'thumbnail' => 'image|file|mimes:webp',
            'thumbnail_mobile' => 'image|file|mimes:webp',
            'thumbnail_jadwal' => 'nullable|image|file|mimes:webp',
            'description' => 'required',
            'outline' => 'required',
            'requirement' => 'nullable',
            'method' => 'nullable',
            'paket_harga' => 'nullable',
            'paket_harga_2' => 'nullable',
            'durasi' => 'nullable',
            'metode' => 'nullable',
            'facility' => 'required',
            'meta_desc' => 'nullable',
            'keywords'  => 'nullable',
            'pricelist' =>  'nullable',
            'platform' => 'nullable',
            'total_waktu' => 'required',
            'deskripsi_persyaratan' => 'nullable',
            'jadwal' => 'nullable',
            'rundown' => 'nullable',
            'pemateri' => 'nullable',
            'tujuan' => 'nullable',
            'home_view' => 'required',
        ]);

        if ($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('training->thumbnail');
        }
        if ($request->file('thumbnail_mobile')) {
            $validatedData['thumbnail_mobile'] = $request->file('thumbnail_mobile')->store('training->thumbnail_mobile');
        }
        if ($request->file('thumbnail_jadwal')) {
            $validatedData['thumbnail_jadwal'] = $request->file('thumbnail_jadwal')->store('training->thumbnail_jadwal');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 400);
        Training::create($validatedData);
        return redirect('/dashboard/trainings')->with('success', 'Program baru berhasil ditambahkan!');
    }

    public function show(Training $training)
    {
        $events = Training::join('events', 'events.training_id', '=', 'trainings.id')
            ->where('events.training_id', '=', $training->id)
            ->orderBy('events.updated_at', 'asc')
            ->get(['events.scheme', 'trainings.name', 'events.date', 'events.location', 'events.id']);
        return view('dashboard.trainings.show', [
            "title"     => "Detail Program",
            'training'  => $training,
            'events'    => $events
        ]);
    }

    public function edit(Training $training)
    {
        $status = ['1', '0'];
        return view('dashboard.trainings.edit', [
            'title' => "Edit Program Pelatihan dan Pembinaan",
            'training' => $training,
            'trainings' => Training::all(),
            'trainingcategories' => TrainingCategories::all(),
            'kategori_sertifikasi' => KategoriSertifikasi::all()
        ], compact('status'));
    }

    public function update(Request $request, Training $training)
    {
        $rules = [
            'training_categories_id'   =>  'required',
            'kategori_sertifikasi' => 'required',
            'name' =>  'required|max:255',
            'thumbnail' => 'image|file|mimes:webp',
            'thumbnail_mobile' => 'image|file|mimes:webp',
            'thumbnail_jadwal' => 'nullable|image|file|mimes:webp',
            'description' => 'required',
            'outline' => 'required',
            'requirement' => 'nullable',
            'method' => 'nullable',
            'paket_harga' => 'nullable',
            'paket_harga_2' => 'nullable',
            'durasi' => 'nullable',
            'metode' => 'nullable',
            'facility' => 'required',
            'meta_desc' => 'nullable',
            'keywords'  => 'nullable',
            'pricelist' =>  'nullable',
            'platform' => 'nullable',
            'total_waktu' => 'required',
            'deskripsi_persyaratan' => 'nullable',
            'home_view' => 'required',
            'jadwal' => 'nullable',
            'rundown' => 'nullable',
            'pemateri' => 'nullable',
            'tujuan' => 'nullable'
        ];

        if ($request->slug != $training->slug) {
            $rules['slug'] = 'required|unique:trainings';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('thumbnail')) {
            if ($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('training->thumbnail');
        }
        if ($request->file('thumbnail_mobile')) {
            if ($request->oldThumbnailMobile) {
                Storage::delete($request->oldThumbnailMobile);
            }
            $validatedData['thumbnail_mobile'] = $request->file('thumbnail_mobile')->store('training->thumbnail_mobile');
        }
        if ($request->file('thumbnail_jadwal')) {
            if ($request->oldThumbnailJadwal) {
                Storage::delete($request->oldThumbnailJadwal);
            }
            $validatedData['thumbnail_jadwal'] = $request->file('thumbnail_jadwal')->store('training-_thumbnail_jadwal');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 400);
        Training::where('id', $training->id)
            ->update($validatedData);
        return redirect('/dashboard/trainings')->with('success', 'Program berhasil diperbaharui!');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect('/dashboard/trainings')->with('success', 'Program berhasil diarsipkan!');
    }

    public function restore(Training $training, $id)
    {
        // $training->restore();
        Training::where('id', $id)->withTrashed()->restore();
        return redirect('/dashboard/trainings')->with('success', 'Program berhasil ditampilkan kembali!');
    }

    public function forceDelete($id)
    {

        $training = Training::onlyTrashed()->findOrFail($id);
        if ($training->thumbnail) {
            Storage::delete($training->thumbnail);
        }
        $training->forceDelete();
        return redirect('/dashboard/trainings')->with('success', 'Program berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Training::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
