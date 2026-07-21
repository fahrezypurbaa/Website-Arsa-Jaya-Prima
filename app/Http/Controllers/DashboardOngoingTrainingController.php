<?php

namespace App\Http\Controllers;

use App\Models\OngoingTraining;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardOngoingTrainingController extends Controller
{
    public function index(Request $request)
    {
        $trainings = OngoingTraining::all();
        $archives = OngoingTraining::onlyTrashed()->where('id', '!=', '0')->get();

        return view('dashboard.ongoing.index', [
            "title" => "Ongoing Training",
        ], compact('trainings', 'archives'));
    }

    public function create()
    {
        return view('dashboard.ongoing.create', [
            "title" => "Tambah Ongoing Training",
            "trainings" => Training::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'training_id' => 'required',
            'name' => 'required',
            'platform' => 'required',
            'jumlah_peserta' => 'required',
            'image' => 'required|file|mimes:webp',
            'image_gallery' => 'required|file|mimes:webp',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('ongoing-_image');
        }
        if ($request->file('image_gallery')) {
            $validatedData['image_gallery'] = $request->file('image_gallery')->store('image-_gallery');
        }
        OngoingTraining::create($validatedData);
        return redirect('/dashboard/ongoing')->with('success', 'Ongoing training berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ongoingTraining = OngoingTraining::where('id', '=', $id)->first();
        $trainings = Training::all();
        return view('dashboard.ongoing.edit', [
            'title' => "Edit Ongoing Training",
        ], compact('ongoingTraining', 'trainings'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'platform' => 'required',
            'jumlah_peserta' => 'required',
            'training_id' => 'required',
            'image' => 'file|mimes:webp',
            'image_gallery' => 'file|mimes:webp',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('ongoing-_image');
        }
        if ($request->file('image_gallery')) {
            if ($request->oldImageGallery) {
                Storage::delete($request->oldImageGallery);
            }
            $validatedData['image_gallery'] = $request->file('image_gallery')->store('image-_gallery');
        }
        OngoingTraining::where('id', '=', $id)->update($validatedData);
        return redirect('dashboard/ongoing')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $deleted = OngoingTraining::where('id', '=', $id);
        $deleted->delete();
        return redirect('dashboard/ongoing')->with('success', 'Ongoing training berhasil diarsipkan');
    }

    public function forceDelete($id)
    {
        $ongoingTraining = OngoingTraining::onlyTrashed()->findOrFail($id);
        if ($ongoingTraining->image) {
            Storage::delete($ongoingTraining->image);
        }
        $ongoingTraining->forceDelete();
        return redirect('/dashboard/ongoing')->with('success', 'Ongoing training berhasil dihapus!');
    }

    public function restore(OngoingTraining $ongoingTraining, $id)
    {
        OngoingTraining::where('id', $id)->withTrashed()->restore();
        return redirect('/dashboard/ongoing')->with('success', 'Program berhasil ditampilkan kembali!');
    }

    public function peserta()
    {
        return redirect('https://drive.google.com/drive/folders/1ID5JaXpPIpGwRT4b28gGNOFpopy2el-q?usp=sharing');
    }
}
