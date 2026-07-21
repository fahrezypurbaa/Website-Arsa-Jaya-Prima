<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;

class LainnyaController extends Controller
{
    public function index()
    {
        SEOMeta::addKeyword(['perpanjangan SIO/SKP/Lisensi']);
        SEOTools::setTitle('SIO/SKP/Lisensi | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Perpanjangan SIO/SKP/Lisensi: perpanjangan SIO/SKP/Lisensi BNSP, perpanjangan Kemnaker');
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
}
