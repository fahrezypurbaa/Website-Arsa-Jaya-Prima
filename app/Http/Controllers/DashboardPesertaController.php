<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPesertaController extends Controller
{
    public function index()
    {
        $peserta = Pelatihan::select('pelatihans.id','pelatihans.role','users.username','users.no_telp','trainings.name as training_name')->join('users','users.id','=','pelatihans.user_id')->join('trainings','trainings.id','=','pelatihans.training_id')->get();
        return view('dashboard.peserta.index', [
            'title' => 'Daftar Peserta',
            "peserta" => $peserta
        ]);
    }

    public function edit(Pelatihan $pelatihan)
    {
        $pelatihan= Pelatihan::select('pelatihans.id','users.id as user_id','users.username','pelatihans.role','users.no_telp','trainings.name as training_name')->join('users','users.id','=','pelatihans.user_id')->join('trainings','trainings.id','=','pelatihans.training_id')->first();
        return view(
            'dashboard.peserta.edit',
            [
                'title' => 'Daftar Pelatihan',
                'peserta' => $pelatihan
            ]
        );
   
    }

    public function update(Request $request, $id){
        $rules = [
            'role' => 'required'
        ];
        $validatedData = $request->validate($rules);
        Pelatihan::where('id','=',$id)->update($validatedData);
        return redirect('/dashboard/peserta');
    }

    public function destroy($id)
    {
        $user = Pelatihan::where('id', $id);
        $user->delete();
        return redirect('/dashboard/peserta')->with("success", "Peserta berhasil dihapus");
    }
}
