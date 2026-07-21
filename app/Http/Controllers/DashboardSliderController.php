<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSliderController extends Controller
{
    public function index() {
        $slider = Slider::get();
        return view('dashboard.sliders.index', [
            'title' => 'Slider Banner Website',
        ], compact('slider'));
    }

    public function create() {
        $status = ['1','0'];
        return view('dashboard.sliders.create', [
            'title' => "Tambah Banner",
        ], compact('status'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' =>  'required|max:255',
            'slug'  =>  'required|unique:sliders',
            'subtitle'  =>  'nullable',
            'image' => 'required|image|file',
            'image_mobile' => 'required|image|file',
            'status' => 'required',
        ]);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('slider->images');
        }
        if($request->file('image_mobile')) {
            $validatedData['image_mobile'] = $request->file('image_mobile')->store('slider->images');
        }
        Slider::create($validatedData);
        return redirect('/dashboard/sliders')->with('success', 'Banner berhasil ditambahkan!');
    }

    public function edit(Slider $slider) {
        $status = ['1','0'];
        return view('dashboard.sliders.edit', [
            'title'     => "Edit Banner",
            'slider'    => $slider
        ], compact('status'));
    }

    public function update(Request $request, Slider $slider) {
        $rules = [
            'title' =>  'required|max:255',
            'subtitle'   =>  'nullable',
            'image' => 'image|file',
            'image_mobile' => 'image|file',
            'status' => 'required',
        ];
        if($request->slug != $slider->slug) {
            $rules['slug'] = 'required|unique:sliders';
        }
        $validatedData = $request->validate($rules);
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('slider->images');
        }
        if($request->file('image_mobile')) {
            if($request->oldImageMobile) {
                Storage::delete($request->oldImageMobile);
            }
            $validatedData['image_mobile'] = $request->file('image_mobile')->store('slider->images');
        }
        Slider::where('id', $slider->id)->update($validatedData);
        return redirect('/dashboard/sliders')->with('success', 'Banner berhasil diperbaharui!');
    }

    public function destroy(Slider $slider)
    {
        if($slider->image) {
            Storage::delete($slider->image);
        }
        Slider::destroy($slider->id);
        return redirect('/dashboard/sliders')->with('success', 'Banner berhasil dihapus');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Slider::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
