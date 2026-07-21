<?php

namespace App\Http\Controllers;

use App\Models\LainnyaCertification;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LainnyaRegisterController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['Pendaftaran Training', 'Pelatihan Lainnya RI']);
        SEOTools::setTitle('Pendaftaran Sertifikasi Lainnya RI | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Formulir pendaftaran untuk mengikuti pelatihan dan sertifikasi program Lainnya RI');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $perpanjanganSIOBNSP = Training::with('kategori')->where('kategori_sertifikasi','=','Perpanjangan SIO/Lisensi/SKP')->get();
        return view('lainnya',['training'=> $perpanjanganSIOBNSP]);

    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slugLainnya'  =>  'unique:lainnya_certifications',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'company'  => 'nullable',
            'company_address'  => 'nullable',
            'training_id'  => 'required',
        ]);
        
        LainnyaCertification::create($validatedData);
        return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
    }

    public function checkSlug(Request $request) {
        $slugLainnya = SlugService::createSlug(LainnyaCertification::class, 'slugLainnya', $request->name);

        return response()->json(['slugLainnya' => $slugLainnya]);
    }
}
