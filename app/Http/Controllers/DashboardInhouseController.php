<?php

namespace App\Http\Controllers;

use App\Models\InhouseRegistrant;
use Illuminate\Http\Request;

class DashboardInhouseController extends Controller
{
    public function index() {
        return view('dashboard.inhouse.index', [
            "title" => "Pendaftar In-House Training",
            'inhouse' => InhouseRegistrant::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function show(InhouseRegistrant $inhouse)
    {
        return view('dashboard.inhouse.show', [
            "title" => "Detail Pendaftar In-House Training",
            'inhouse'  => $inhouse
        ]);
    }

    public function edit(InhouseRegistrant $inhouse)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.inhouse.edit', [
            "title" => "Edit Pendaftar In-House Training",
            'inhouse' => $inhouse,
        ], compact('progress'));
    }

    public function update(Request $request, InhouseRegistrant $inhouse)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slugInhouse != $inhouse->slugInhouse) {
            $rules['slugInhouse'] = 'required|unique:inhouse_registrants';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        InhouseRegistrant::where('id', $inhouse->id)
            ->update($validatedData);

        return redirect('/dashboard/inhouse')->with('success', 'Status Follow Up berhasil diperbaharui!');
    }
}
