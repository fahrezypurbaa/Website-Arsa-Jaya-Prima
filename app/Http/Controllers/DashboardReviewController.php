<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardReviewController extends Controller
{
    public function index() {

        $review = Review::get();

        return view('dashboard.reviews.index', [
            'title' => 'Testimoni Pelatihan',
        ], compact('review'));
    }

    public function create() {
        return view('dashboard.reviews.create', [
            'title' => "Tambah Testimoni",
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:reviews',
            'company'  =>  'nullable',
            'training'  =>  'required',
            'image' => 'image|file|max:1024',
            'review' => 'required',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('review->images');
        }

        Review::create($validatedData);

        return redirect('/dashboard/reviews')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function edit(Review $review) {
        return view('dashboard.reviews.edit', [
            'title'     => "Edit Testimoni",
            'review'    => $review
        ]);
    }

    public function update(Request $request, Review $review) {
        $rules = [
            'name' =>  'required|max:255',
            'company'  =>  'nullable',
            'training'  =>  'required',
            'image' => 'image|file|max:1024',
            'review' => 'required',
        ];

        if($request->slug != $review->slug) {
            $rules['slug'] = 'required|unique:reviews';
        }

        $validatedData = $request->validate($rules);


        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('review->images');
        }

        Review::where('id', $review->id)->update($validatedData);

        return redirect('/dashboard/reviews')->with('success', 'Testimoni berhasil diperbaharui!');
    }

    public function destroy(Review $review)
    {
        if($review->image) {
            Storage::delete($review->image);
        }

        Review::destroy($review->id);

        return redirect('/dashboard/reviews')->with('success', 'Testimoni berhasil dihapus!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Review::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
