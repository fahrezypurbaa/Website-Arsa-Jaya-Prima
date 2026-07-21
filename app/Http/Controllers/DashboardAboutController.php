<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\SEOTools;

class DashboardAboutController extends Controller
{
    public function index() {

        $abouts = About::where('id', '1')->get();

        return view('dashboard.about.index', [
            'title' => 'Profile Singkat Perusahaan',
        ], compact('abouts'));
    }

    public function create()
    {
        return view('dashboard.about.create', [
            'title' => "Tambah Profil Perusahaan",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vission' =>  'required',
            'mission' =>  'required',
            'privilege' =>  'nullable',
            'link' =>  'nullable',
            'image' => 'image|file|max:1024',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('about->images');
        }
        About::create($validatedData);
        return redirect('/dashboard/about')->with('success', 'Profil berhasil ditambahkan!');
    }

    public function edit(About $about) {
        return view('dashboard.about.edit', [
            'title'     => "Edit Profil Perusahaan",
            'about'    => $about
        ]);
    }

    public function update(Request $request, About $about) {
        $rules = [
            'vission' =>  'required',
            'mission' =>  'required',
            'privilege' =>  'nullable',
            'link' =>  'nullable',
            'image' => 'image|file|max:1024',
        ];
        $validatedData = $request->validate($rules);
        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('about->images');
        }
        About::where('id', $about->id)->update($validatedData);
        return redirect('/dashboard/about')->with('success', 'Profil berhasil diperbaharui!');
    }

    public function showDocuments(){
        $documents = Document::get();
        return view('dashboard.about.documents',['title' => 'Dokumen'], compact('documents'));
    }

    public function showDocument($id){
        SEOTools::setTitle('Proposal Penawaran Kerjasama | Arsa Training & Consulting', 'Arsa Training & Consulting');
        $document =  Document::where('id', $id)->latest()->first();
        $filePath = 'https://docs.google.com/gview?embedded=true&url=https://www.arsatraining.com/storage/'.$document->file.'&amp;embedded=true';
        return view('viewPdfAdmin', [
            "title" => "Proposal",
            "file" => $filePath,
        ]);
    }

    public function createDocuments(){
        return view('dashboard.about.createDocument',['title' => 'Tambah Dokumen']);
    }

    public function storeDocument(Request $request){
        $validatedData = $request->validate([
            'title' => "required",
            'type'=> "required",
            'file' => "file"
        ]);
        if($request->file("file")){
            $validatedData['file'] = $request->file('file')->store('files');
        }
        Document::create($validatedData);
        return redirect('/dashboard/about/document')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function updateDocument(Request $request, $id){
        $rules = [
            'title' => "required",
            'type'=> "required",
            'file' => "file"
        ];
        $validatedData = $request->validate($rules);
        if($request->file("file")){
            if($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('files');
        }
        Document::where('id', $id)->update($validatedData);
        return redirect('dashboard/about/document')->with('success', 'Dokumen berhasil diupdate!');

    } 

    public function editDocument($id ) {
        return view('dashboard.about.editDocument', [
            'title'     => "Edit Document",
            'document'    => Document::where('id', $id)->first()
        ]);
    }

    public function destroyDocument($id)
    {
        $document =  Document::where('id', $id)->first();
        if($document->file) {
            Storage::delete($document->file);
        }
        Document::destroy($id);
        return redirect('dashboard/about/document')->with('success', 'Dokumen berhasil dihapus!');
    }

}
