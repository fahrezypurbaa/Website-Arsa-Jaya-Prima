<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardVideoController extends Controller
{
    public function index() {

        $video = Video::where('id', '1')->get();

        return view('dashboard.video.index', [
            'title' => 'Video Dan Deskripsi Galeri',
        ], compact('video'));
    }
    
    public function create()
    {
        return view('dashboard.video.create', [
            'title' => "Tambah Video Dan Deskripsi Galeri",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' =>  'required',
            'description' =>  'required',
            'link' =>  'nullable',
            'thumbnail' => 'image|file|max:1024',
        ]);

        if($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('video->thumbnail');
        }

        Video::create($validatedData);

        return redirect('/dashboard/video')->with('success', 'Video dan Deskripsi Galeri berhasil ditambahkan!');
    }

    public function edit(Video $video) {
        return view('dashboard.video.edit', [
            'title'     => "Edit Video Dan Deskripsi Galeri",
            'video'    => $video
        ]);
    }

    public function update(Request $request, Video $video) {
        $rules = [
            'title' =>  'required',
            'description' =>  'required',
            'link' =>  'nullable',
            'thumbnail' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);


        if($request->file('thumbnail')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnail->images');
        }

        Video::where('id', $video->id)->update($validatedData);

        return redirect('/dashboard/video')->with('success', 'Video dan Deskripsi Galeri berhasil diperbaharui!');
    }
}
