<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Softskill;

class DashboardSoftskillController extends Controller
{
    public function index() {
        return view('dashboard.softskill.index', [
            "title" => "Pendaftar Training Softskill",
            'softskill' => Softskill::all()->sortDesc()
        ]);
    }

    public function show($id)
    {
        $softskill = Softskill::findOrFail($id);
        return view('dashboard.softskill.show', [
            'title' => 'Detail Pendaftar Training Softskill',
            'softskill'  => $softskill
        ]);
    }

    public function edit($id)
    { 
        $softskill = Softskill::findOrFail($id);
        $progress = ['Sudah','Belum'];
        $title = "Edit Pendaftar Training Softskill";

        return view('dashboard.softskill.edit', compact('softskill', 'progress', 'title'));
    }

    public function update(Request $request, $id)
    {
        $softskill = Softskill::findOrFail($id);

        $rules = [
            'progress'  => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        $softskill->update($validatedData);

        return redirect('/dashboard/softskill')->with('success', 'Status Follow Up berhasil diperbaharui!');
    }

}
