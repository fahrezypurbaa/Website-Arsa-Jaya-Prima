<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DashboardUpdatePasswordController extends Controller
{
    public function edit() {
        return view('dashboard.password.edit', [
            'title' => 'Ubah Password',
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'current_password'  =>  ['required'],
            'password'          =>  ['required', 'min:8', 'confirmed']
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);

            return back()->with('success', 'Password berhasil diubah');
        }
        throw ValidationException::withMessages([
                'current_password'  => 'Password terkini tidak sesuai',
        ]);
    }
}
