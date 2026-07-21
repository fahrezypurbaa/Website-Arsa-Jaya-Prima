<?php

namespace App\Http\Controllers;

use App\Models\KemnakerCertification;
use Illuminate\Http\Request;

class DashboardKemnakerController extends Controller
{
    public function index()
    {
        return view('dashboard.kemnaker.index', [
            "title" => "Pendaftar Sertifikasi Kemnaker RI",
            'kemnaker' => KemnakerCertification::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show($id) {
        $kemnaker = KemnakerCertification::findOrFail($id);
        return view('dashboard.kemnaker.show', [
            'title' => 'Detail Pendaftar Sertifikasi Kemnaker RI',
            'kemnaker' => $kemnaker
        ]);
    }

    public function edit($id) {
        $kemnaker = KemnakerCertification::findOrFail($id);
        $progress = ['Sudah', 'Belum'];
        $title = "Edit Pendaftar Sertifikasi Kemnaker RI";
        return view('dashboard.kemnaker.edit', compact('kemnaker', 'progress', 'title'));
    }

    public function update(Request $request, $id) {
        $kemnaker = KemnakerCertification::findOrFail($id);

        $rules = [
            'progress'  => 'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        $kemnaker->update($validatedData);

        return redirect('/dashboard/kemnaker')->with('success', 'Status Follow Up berhasil diperbaharui!');
    }
}
