<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\KemnakerCertification;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Cviebrock\EloquentSluggable\Services\SlugService;

class KemnakerRegisterController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['Pendaftaran Training', 'Pelatihan KEMNAKER RI']);
        SEOTools::setTitle('Pendaftaran Sertifikasi Kemnaker RI | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Formulir pendaftaran untuk mengikuti pelatihan dan sertifikasi program KEMNAKER RI');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $training = Training::where('training_categories_id', 1)->get();

        return view('kemnaker', [
            'training' => $training
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slugKemnaker'  =>  'required|unique:kemnaker_certifications',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'company'  => 'nullable',
            'company_address'  => 'nullable',
            'training_id'  => 'required',
            'kategori_peserta' => 'required',
            'sumber_informasi' => 'required'
        ]);
        
        KemnakerCertification::create($validatedData);
        return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
    }

    public function checkSlug(Request $request) {
        $slugKemnaker = SlugService::createSlug(KemnakerCertification::class, 'slugKemnaker', $request->name);

        return response()->json(['slugKemnaker' => $slugKemnaker]);
    }
}
