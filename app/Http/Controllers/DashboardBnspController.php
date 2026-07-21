<?php

namespace App\Http\Controllers;

use App\Models\BnspCertification;
use Illuminate\Http\Request;

class DashboardBnspController extends Controller
{
    public function index() {
        return view('dashboard.bnsp.index', [
            "title" => "Pendaftar Sertifikasi BNSP",
            'bnsp' => BnspCertification::all()->sortDesc()
        ]);
    }

    public function show(BnspCertification $bnsp)
    {
        return view('dashboard.bnsp.show', [
            "title" => "Detail Pendaftar Sertifikasi BNSP",
            'bnsp'  => $bnsp
        ]);
    }

    public function edit(BnspCertification $bnsp)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.bnsp.edit', [
            "title" => "Edit Pendaftar Sertifikasi BNSP",
            'bnsp' => $bnsp,
        ], compact('progress'));
    }

    public function update(Request $request, BnspCertification $bnsp)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slugBnsp != $bnsp->slugBnsp) {
            $rules['slugBnsp'] = 'required|unique:bnsp_certifications';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        BnspCertification::where('id', $bnsp->id)
            ->update($validatedData);

        return redirect('/dashboard/bnsp')->with('success', 'Status Follow Up berhasil diperbaharui!');
    }
}
