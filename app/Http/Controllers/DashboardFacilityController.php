<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardFacilityController extends Controller
{
    public function index() {
        $facilities = Facility::get();
        return view('dashboard.facilities.index', [
            'title' => 'Fasilitas Training',
        ], compact('facilities'));
    }

    public function create()
    {
        $status = ['1','0'];
        return view('dashboard.facilities.create', [
            'title' => "Tambah Fasilitas",
        ], compact('status'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'image' => 'image|file|max:1024',
            'image_mobile' => 'image|file|max:1024',
            'status'    => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('facility->images');
        }
        if($request->file('image_mobile')) {
            $validatedData['image_mobile'] = $request->file('image_mobile')->store('facility->image_mobile');
        }

        Facility::create($validatedData);

        return redirect('/dashboard/facilities')->with('success', 'Fasilitas berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $status = ['1','0'];
        $facility = Facility::find($id);
        return view('dashboard.facilities.edit', [
            'title' => "Edit Fasilitas",
        ], compact('status', 'facility'));
    }

    public function update(Request $request, $id)
    {
        $facility = Facility::find($id);
        $facility->status = $request->input('status');
        $facility->update();
        return redirect('/dashboard/facilities')->with('success', 'Fasilitas berhasil diperbaharui!');
    }

    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);

        if($facility->image) {
            Storage::delete($facility->image);
       
        }
        if($facility->image_mobile) {
            Storage::delete($facility->image_mobile);
        }
        
        Facility::destroy($facility->id);
        return redirect('/dashboard/facilities')->with('success', 'Fasilitas berhasil dihapus');
    }
}
