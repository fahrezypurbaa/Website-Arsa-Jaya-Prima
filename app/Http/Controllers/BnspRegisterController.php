<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\BnspCertification;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BnspRegisterController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['Pendaftaran Training', 'Pelatihan BNSP']);
        SEOTools::setTitle('Pendaftaran Sertifikasi BNSP | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Formulir pendaftaran untuk mengikuti pelatihan dan sertifikasi program BNSP');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $training = Training::where('training_categories_id', 2)->get();

        return view('bnsp', [
            'training' => $training
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slugBnsp'  =>  'required|unique:bnsp_certifications',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'company'  => 'nullable',
            'company_address'  => 'nullable',
            'training_id'  => 'required',
            'kategori_peserta' => 'required',
            'sumber_informasi' => 'required'
        ]);
        
        BnspCertification::create($validatedData);
        return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
    }

    public function checkSlug(Request $request) {
        $slugBnsp = SlugService::createSlug(BnspCertification::class, 'slugBnsp', $request->name);

        return response()->json(['slugBnsp' => $slugBnsp]);
    }
}
