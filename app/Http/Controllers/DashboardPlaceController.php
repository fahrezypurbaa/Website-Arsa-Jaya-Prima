<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();

        return view('dashboard.places.index', [
            'title' => 'Lokasi Training',
        ], compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.places.create', [
            'title' => "Tambah Lokasi Training",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // multiple image upload start
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:places',
            'images' => 'required|array', 
            'city'  =>  'nullable',
            'desc' => 'required',
            'training_list'  =>  'nullable',
            'address' => 'required',
            'link' => 'required',
        ]);

        $new_location = Place::create($validatedData);

        if ($request->has('images')) {
            foreach($request->file('images') as $image) {
                $imageName = $validatedData['name'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                // $image->move(public_path('/storage/place->images', $imageName));
                $image->storeAs('place->images', $imageName);
                // $image->store('place->images');
                Image::create([
                    'place_id'  => $new_location->id,
                    'image'     => $imageName
                ]);
            }
        }
        // multiple image upload start
        return redirect('/dashboard/places')->with('success', 'Lokasi Training berhasil ditambahkan!');
    }

    public function images($id){
        $place = Place::find($id);
        if(!$place) abort(404);
        $images = $place->images;
        // return view('dashboard.places.images',compact('place','images'));
        return view('dashboard.places.images', [
            'title' => 'Lokasi Training',
        ], compact('place', 'images'));
    }

    public function removeImage($id) {
        $image = Image::find($id);
        if (!$image) abort(404);
        // File::delete($image);
        // unlink(public_path('storage/place->images/'.$image->image));
        // $image->delete();
        
        $image_path = public_path().'/storage/place->images/'.$image->image;
        unlink($image_path);
        $image->delete();
        
        // foreach($image as $image){
        //     if (File::exists("public_html/storage/place->images/" . $image->image)) {
        //         File::delete("public_html/storage/place->images/" . $image->image);
        //     }
        // }

        return back()->with('success', 'Gambar berhasil dihapus');
    }

    public function addImages(Request $request, $id) {
        $place = Place::find($id);
        if (!$place) abort(404);
        if ($request->has('images')) {
            foreach($request->file('images') as $image) {
                $imageName = $place['name'].'-image-'.time().rand(1,1000).'.'.$image->extension();
                // $image->move(public_path('/storage/place->images', $imageName));
                $image->storeAs('place->images', $imageName);
                // $image->store('place->images');
                Image::create([
                    'place_id'  => $place->id,
                    'image'     => $imageName
                ]);
            }
        }
        return back()->with('success', 'Gambar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        $images = $place->images;

        return view('dashboard.places.show', [
            "title" => "Preview Lokasi Training",
            'place'  => $place
        ], compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        if(!$place) abort(404);
        $images = $place->images;
        return view('dashboard.places.edit', [
            "title" => "Edit Lokasi Training",
            'place' => $place
        ], compact('images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        // dd($request->all());
        $rules = [
            'name' =>  'required|max:255',
            'city'  =>  'nullable',
            'desc' => 'required',
            'training_list'  =>  'nullable',
            'address' => 'required',
            'link' => 'required',
        ];

        if($request->slug != $place->slug) {
            $rules['slug'] = 'required|unique:places';
        }

        $validatedData = $request->validate($rules);

        if($request->hasFile("images")) {
            $images = [];
            foreach ($data['images'] as $image) {
                Storage::delete($place->images);
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path =  $image->storeAs('location->images', $imageName);
                array_push($images, $image_path);
                $data['images'] = $images;
                $project->update($data);

            }
        }


        Place::where('id', $place->id)->update($validatedData);
        
        return redirect('/dashboard/places');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $place = Place::findOrFail($id);

        $images = Image::where("place_id", $place->id)->get();

        foreach($images as $image){
            if (File::exists("public/storage/place->images/" . $image->image)) {
                File::delete("public/storage/place->images/" . $image->image);
            }
        }
        
        $place->delete();

        return redirect('/dashboard/places')->with('success', 'Lokasi Training berhasil dihapus');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Place::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
