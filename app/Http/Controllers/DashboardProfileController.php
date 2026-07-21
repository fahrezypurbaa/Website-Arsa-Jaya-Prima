<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardProfileController extends Controller
{

    public function edit() {
        return view('dashboard.profile.edit', [
                    'title' => 'Profil',
                ]);
    }

    public function update(Request $request) {
        $rules = [
                'name'  => 'required|max:255',
                'username'  => ['required', 'min:3', 'max:255', 'alpha_num', 'unique:users,username,'.auth()->id()],
                'picture' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('picture')) {
            if($request->oldPicture) {
                Storage::delete($request->oldPicture);
            }
            $validatedData['picture'] = $request->file('picture')->store('user->picture');
        }

        auth()->user()->update($validatedData);

        return back()->with('success', 'Your profile has been updated');
    }
}
