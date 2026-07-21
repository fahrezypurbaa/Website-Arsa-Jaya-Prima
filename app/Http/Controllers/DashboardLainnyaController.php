<?php

namespace App\Http\Controllers;

use App\Models\LainnyaCertification;
use Illuminate\Http\Request;

class DashboardLainnyaController extends Controller
{
    public function index() {
        return view('dashboard.lainnya.index', [
            "title" => "Pendaftar Perpanjangan SIO/SKP/Lisensi",
            'lainnya' => LainnyaCertification::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show(LainnyaCertification $lainnya)
    {
        return view('dashboard.lainnya.show', [
            "title" => "Detail Pendaftar Perpanjangan SIO/SKP/Lisensi",
            'lainnya'  => $lainnya
        ]);
    }

    public function edit(LainnyaCertification $lainnya)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.lainnya.edit', [
            "title" => "Edit Pendaftar Perpanjangan SIO/SKP/Lisensi",
            'lainnya' => $lainnya,
        ], compact('progress'));
    }

    public function update(Request $request, LainnyaCertification $lainnya)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->sluglainnya != $lainnya->sluglainnya) {
            $rules['sluglainnya'] = 'required|unique:lainnya_certifications';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        LainnyaCertification::where('id', $lainnya->id)
            ->update($validatedData);

        return redirect('/dashboard/lainnya')->with('success', 'Status Follow Up berhasil diperbaharui!');
    }
}
