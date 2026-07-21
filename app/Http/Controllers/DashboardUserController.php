<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', '=', '0')->get();
        $perusahaan = Perusahaan::all();
        return view('dashboard.user.index', [
            'title' => 'Daftar Pengguna',
            "perusahaan" => $perusahaan,
            "users" => $users
        ]);
    }


    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('dashboard.user.show', [
            'title' => 'Pengguna',
            'user' => $user,
        ]);
    }


    public function destroy($id){
        $user = User::where('id', $id);
        $user->delete();
        return redirect('/dashboard/users')->with("success","User berhasil dihapus");
    }

    public function deletePerusahaan($id){
        $perusahaan = Perusahaan::where("id", $id);
        $perusahaan->delete();
        return redirect('/dashboard/users')->with("success","Perusahaan berhasil dihapus");
    }

    public function showPerusahaan($id){
        $perusahaan = Perusahaan::with('user')->first();
        return view('dashboard.user.perusahaan', [
            'title' => 'Perusahaan',
        ], compact('perusahaan'));
    }
}
