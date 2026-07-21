<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardInstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::get();

        return view('dashboard.instructors.index', [
            'title' => 'Instruktur Training',
        ], compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.instructors.create', [
            'title' => "Tambah Instruktur",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:instructors',
            'image' => 'image|file|max:1024',
            'skill'  => 'required',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('instructor->images');
        }

        Instructor::create($validatedData);

        return redirect('/dashboard/instructors')->with('success', 'Instruktur berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        return view('dashboard.instructors.show', [
            "title" => "Detail Instruktur Training",
            'instructor'  => $instructor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view('dashboard.instructors.edit', [
            'title' => "Edit Instruktur",
            'instructor' => $instructor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $rules = [
            'name' =>  'required|max:255',
            'image' => 'image|file|max:1024',
            'skill'  => 'required',
        ];
        
        if($request->slug != $instructor->slug) {
            $rules['slug'] = 'required|unique:instructors';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('instructor->image');
        }

        Instructor::where('id', $instructor->id)
            ->update($validatedData);

        return redirect('/dashboard/instructors')->with('success', 'Intruktur berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        if($instructor->image){
            Storage::delete($instructor->image);
        }
        Instructor::destroy($instructor->id);

        return redirect('/dashboard/instructors')->with('success', 'Intruktur berhasil dihapus!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Instructor::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
