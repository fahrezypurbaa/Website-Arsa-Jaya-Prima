<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;

class DashboardBerkasController extends Controller
{
    public function index()
    {
        $berkas = Berkas::select('user_id', Berkas::raw('MAX(id) as id'), Berkas::raw('COUNT(*) as total_berkas'))
        ->with('user:id,name,username,email,no_telp')  
        ->groupBy('user_id')
        ->get();
        return view('dashboard.berkas.index', [
            'title' => 'Berkas Peserta'
        ], compact('berkas'));
    }
    public function legalitas(){
        return redirect('https://drive.google.com/file/d/15zoBCAE9QC-IIWmZ0ZgrFvt0V9nThNkA/view?usp=sharing');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $berkass = Berkas::where('user_id', '=', $id)->get();
        return view('dashboard.berkas.show', [
            'title' => 'Berkas Peserta'
        ], compact('berkass'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
