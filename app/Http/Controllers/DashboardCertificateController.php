<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('dashboard.certificates.index', [
            'title' => 'Data Sertifikat',
            'certificates' => Certificate::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.certificates.create', [
            'title' => "Tambah Sertifikat",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'certificate' =>  'required|max:255',
            'name' =>  'required|max:255',
            'gelar' => 'nullable',
            'slug'  =>  'required|unique:certificates',
            'company' => 'required',
            'training'  => 'required',
            'periode' => 'required',
            'status'  => 'nullable',
            'active_periode'  => 'nullable'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('certificate->photos');
        }

        Certificate::create($validatedData);

        return redirect('/dashboard/certificates')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return view('dashboard.certificates.show', [
            'title' => "Detail Sertifikat",
            'certificate' => $certificate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('dashboard.certificates.edit', [
            'title' => "Edit Sertifikat",
            'certificate' => $certificate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $rules = [
            'image' => 'image|file|max:1024',
            'certificate' =>  'required|max:255',
            'name' =>  'required|max:255',
            'gelar' => 'nullable',
            'company' => 'required',
            'training'  => 'required',
            'periode' => 'required',
            'status'  => 'nullable',
            'active_periode'  => 'nullable'
        ];
        
        if($request->slug != $certificate->slug) {
            $rules['slug'] = 'required|unique:certificates';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('certificate->photos');
        }

        Certificate::where('id', $certificate->id)
            ->update($validatedData);

        return redirect('/dashboard/certificates')->with('success', 'Sertifikat berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        if($certificate->image){
            Storage::delete($certificate->image);
        }
        Certificate::destroy($certificate->id);

        return redirect('/dashboard/certificates')->with('success', 'Sertifikat berhasil dihapus!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Certificate::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
