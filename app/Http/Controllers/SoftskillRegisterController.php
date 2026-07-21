<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Softskill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SoftskillRegisterController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['Pendaftaran Training', 'Pelatihan Softskill', ' Pelatihan Keterampilan']);
        SEOTools::setTitle('Pendaftaran Training Softskill | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Formulir pendaftaran untuk mengikuti pelatihan dan sertifikasi program Softskill');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $training = Training::where('training_categories_id', 3)->get();
        
        return view('softskill', [
            'training' => $training
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slugSoftskill'  =>  'required|unique:softskills',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'company'  => 'nullable',
            'company_address'  => 'nullable',
            'training_id'  => 'required',
            'kategori_peserta' => 'required',
            'sumber_informasi' => 'required'
        ]);
        
        Softskill::create($validatedData);
        return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
    }

    public function checkSlug(Request $request) {
        $slugSoftskill = SlugService::createSlug(Softskill::class, 'slugSoftskill', $request->name);

        return response()->json(['slugSoftskill' => $slugSoftskill]);
    }
}
