<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardClientController extends Controller
{
    public function index()
    {
        return view('dashboard.client.index',[
            "title" => "Our Client",
            "clients" => Client::all()
        ]);
    }

    public function create()
    {
        return view(
            'dashboard.client.create',[
                "title" => "Tambah Client"
            ]
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "image" => "required|file"
        ]);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('client-_image');
        }
        Client::create($validatedData);
        return redirect('/dashboard/client')->with('success','Client berhasil ditambahkan');
    }

    public function edit(Client $client)
    {
        $client = Client::where('id','=', $client->id)->first();
        return view('dashboard.client.edit',[
            "title" => "Edit Client",
            "client" => $client
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "image" => "image|file"
        ]);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('client-_image');
        }
        Client::where('id', '=',$id)->update($validatedData);
        return redirect('dashboard/client')->with('success','Client berhasil diperbarui');
    }

    public function destroy($id)
    {
        Client::where('id','=',$id)->delete();
        return redirect('/dashboard/client')->with('success','Client berhasil dihapus!');
    }
}
