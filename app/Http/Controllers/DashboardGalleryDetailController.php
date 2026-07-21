<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use App\Models\GalleryDetail;
use App\Models\Training;

class DashboardGalleryDetailController extends Controller
{
    public function index()
    {
        $photos = Gallery::all();
        return view('dashboard.galleries.index', [
            'title' => 'Foto Galeri',
        ], compact('photos'));
    }

    public function create()
    {
        return view('dashboard.galleries.create', [
            'title' => "Tambah Foto Galeri",
            'gallery_categories' => Training::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gallery_category_id'  =>  'required',
            'name' =>  'required|max:255',
            'photos' => 'required|array', 
            'training'  =>  'required',
            'schedule' => 'required',
        ]);

        $new_photo = GalleryDetail::create($validatedData);
        if ($request->has('photos')) {
            foreach($request->file('photos') as $image) {
                $imageName = $validatedData['name'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->storeAs('photo->images', $imageName);
                Gallery::create([
                    'gallery_detail_id'  => $new_photo->id,
                    'photo'     => $imageName
                ]);
            }
        }

        // multiple image upload start
        return redirect('/dashboard/galleries')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gallery = Gallery::with('gallery_detail')->findOrFail($id);
        return view('dashboard.galleries.edit',['title' => "Edit Gallery"], compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'photo' => '', 
            'gallery_category_id'  =>  '',
            'name' =>  'max:255',
            'training'  =>  '',
            'schedule' => '',
        ]);
        if($request->hasFile("photo")){
            if($request->oldPicture){
                Storage::delete($request->olPicture);
            }
            $imageName = $request->input('name').'-image-'.time().rand(1,1000).'.'.$request->file('photo')->extension();
                 
            $validatedData['photo'] = $request->file('photo')->storeAs('photo->images', $imageName);
        }
         Gallery::where('id', $gallery->id)->update(['photo'=>$imageName]);
        return redirect('/dashboard/galleries')->with('success', 'Foto berhasil diupdate!');    
    }

    public function delete($id) {
        $image = Gallery::find($id);
        if (!$image) abort(404);
        unlink(public_path('storage/photo->images/'.$image->photo));
        $image->delete();
        return back()->with('success', 'Foto berhasil dihapus');
    }
}
