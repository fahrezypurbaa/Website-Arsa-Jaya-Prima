<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CertificateController extends Controller
{
    public function index(Request $request) {
        SEOMeta::addKeyword(['cek sertifikat']);
        
        SEOTools::setTitle('Sertifikat | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Data sertifikat peserta training yang diselenggarakan oleh Arsa Training.');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $keyword = $request->search;
        $certificate =  Certificate::where('name', $keyword)->orWhere('certificate', $keyword)->paginate(1);

        return view('certificate', compact('certificate'));
    }
}
