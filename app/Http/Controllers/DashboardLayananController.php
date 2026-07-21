<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DashboardLayananController extends Controller
{
    
    public function index()
    {
        $layanans = Layanan::get();
        return view('dashboard.layanan.index',[
            'title'=>'Layanan',
        ], compact('layanans'));
    }

    public function create()
    {
        return view('dashboard.layanan.create',[
            'title'=>'Tambah Layanan'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'icon' => 'image|file',
            'title' => 'required|max:100',
            'description' => 'required|max:200'
        ]);
        if($request->file('icon')) {
            $validatedData['icon'] = $request->file('icon')->store('layanan');
        }
        Layanan::create($validatedData);
        return redirect('/dashboard/layanan')->with('success','Layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $layanan = Layanan::find($id);
        return view('dashboard.layanan.edit',[
            'title' => 'Edit Layanan',
            'layanan' => $layanan
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {
        $rules = [
            'icon' => 'image|file',
            'title' => 'required|max:100',
            'description' => 'required|max:200'
        ];
        $validatedData = $request->validate($rules);
        if($request->file('icon')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['icon'] = $request->file('icon')->store('layanan');
        }
        Layanan::where('id', $layanan->id)->update($validatedData);
        return redirect('/dashboard/layanan')->with('success', 'Layanan berhasil diperbaharui!');
    }

    public function destroy(Layanan $layanan)
    {
        if($layanan->icon) {
            Storage::delete($layanan->icon);
        }
        Layanan::destroy($layanan->id);
        return redirect('/dashboard/layanan')->with('success', 'Banner berhasil dihapus');
    }
}
