<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DashboardLokerController extends Controller
{
    public function index()
    {
        $lokers = Loker::all();
        return view('dashboard.loker.index',[
            "title" => "Loker"
        ], compact('lokers'));
    }

    public function create()
    {
        return view('dashboard.loker.create',[
            "title" => "Tambah Loker"
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'logo_perusahaan' => 'required',
            'slug' => 'required|unique:lokers',
            'perusahaan' => 'required',
            'gaji' => 'required',
            'pendidikan' => 'required',
            'pengalaman_kerja' => 'required',
            'lokasi' => 'required',
            'link' => '',
            'deskripsi_pekerjaan' => 'required',
            'deskripsi_perusahaan' => '',
            'sumber' => '',
            'waktu' => '',
        ];
      
        $validatedData = $request->validate($rules);
        if($request->file('logo_perusahaan')){
            $validatedData['logo_perusahaan'] =  $request->file('logo_perusahaan')->store('loker-_thumbnail');
        }
        Loker::create($validatedData);
        return redirect('/dashboard/lokers')->with('success','Loker berhasil diupdate');

    }

    public function show(Loker $loker)
    {
        return view('dashboard.loker.show',[
            "title" => "Loker",
            "loker" => $loker
        ]);
    }

    public function edit(Loker $loker)
    {
        return view('dashboard.loker.edit',[
            'loker' => $loker,
            'title' => "Edit Loker"
        ]);
    }

    public function update(Request $request, Loker $loker)
    {
        $rules = [
            'title' => 'required',
            'logo_perusahaan' => '',
            'perusahaan' => 'required',
            'gaji' => 'required',
            'pendidikan' => 'required',
            'pengalaman_kerja' => 'required',
            'lokasi' => 'required',
            'link' => 'required',
            'deskripsi_pekerjaan' => 'required',
            'deskripsi_perusahaan' => 'required',
            'sumber' => 'required',
            'waktu' => 'required',
        ];
        if($request->slug != $loker->slug){
            $rules['slug'] = 'required|unique:lokers';
        }
        $validatedData = $request->validate($rules);
        if($request->file('logo_perusahaan')){
            $validatedData['logo_perusahaan'] =  $request->file('logo_perusahaan')->store('loker->thumbnail');
        }
        Loker::where('id', $loker->id)->update($validatedData);
        return redirect('/dashboard/lokers')->with('success','Loker berhasil ditambah');
    }

    public function destroy(Loker $loker)
    {
        $loker->delete();
        return redirect('/dashboard/lokers')-> with('success', 'Loker berhasil dihapus');
    }
}
