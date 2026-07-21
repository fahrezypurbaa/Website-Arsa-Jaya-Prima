<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAdsController extends Controller
{
    public function index() {

        $ad = Ads::get();

        return view('dashboard.ads.index', [
            'title' => 'Iklan',
        ], compact('ad'));
    }

    public function create()
    {
        $status = ['1','0'];
        return view('dashboard.ads.create', [
            'title' => "Tambah Iklan",
        ], compact('status'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  => 'required|unique:ads',
            'image' => 'image|file|max:1024',
            'button' =>  'nullable',
            'link' =>  'nullable',
            'status' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('ads->images');
        }

        Ads::create($validatedData);

        return redirect('/dashboard/ads')->with('success', 'Iklan berhasil ditambahkan!');
    }

    public function edit(Ads $ad)
    {
        $status = ['1','0'];
        return view('dashboard.ads.edit', [
            'title' => "Edit Iklan",
            'ad'   => $ad
        ], compact('status'));
    }

    public function update(Request $request, Ads $ad)
    {
        $rules = [
            'name' =>  'required|max:255',
            'image' => 'image|file|max:1024',
            'button' =>  'nullable',
            'link' =>  'nullable',
            'status' => 'required'
        ];
        
        if($request->slug != $ad->slug) {
            $rules['slug'] = 'required|unique:ads';
        }

        $validatedData = $request->validate($rules);
        
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('ads->images');
        }

        Ads::where('id', $ad->id)
        ->update($validatedData);

        return redirect('/dashboard/ads')->with('success', 'Iklan berhasil dihapus');
    }

    public function destroy(Ads $ads)
    {
        if($ads->image) {
            Storage::delete($ads->image);
        }
        
        Ads::destroy($ads->id);

        return redirect('/dashboard/ads')->with('success', 'Iklan berhasil dihapus');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Ads::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
