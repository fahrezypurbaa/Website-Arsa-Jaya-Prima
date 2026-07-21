<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class DashboardMessageController extends Controller
{
    public function index()
    {
        return view('dashboard.messages.index', [
            "title" => "Pesan Masuk",
            'messages' => Message::all()->sortDesc()
        ]);
    }

    public function show(Message $message)
    {
        return view('dashboard.messages.show', [
            "title" => "Detail Pesan",
            'message'  => $message
        ]);
    }

    public function edit(Message $message)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.messages.edit', [
            "title" => "Edit Pesan",
            'message' => $message,
        ], compact('progress'));
    }

    public function update(Request $request, Message $message)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slug != $message->slug) {
            $rules['slug'] = 'required|unique:messages';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Message::where('id', $message->id)
            ->update($validatedData);

        return redirect('/dashboard/messages')->with('success', 'Status Follow Up berhasil diperbaharui!');
    }
}
