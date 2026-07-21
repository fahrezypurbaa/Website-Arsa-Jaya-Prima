<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Document;
use App\Models\CustomerService;

class AboutController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['sertifikasi k3', 'pelatihan K3', ' sertifikasi KEMNAKER', 'sertifikasi BNSP']);
        SEOTools::setTitle('Tentang Kami | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('PT Arsa Jaya Prima penyedia pelatihan & sertifikasi K3 dan berbagai training softskill dibawah lisensi resmi KEMNAKER RI dan BNSP');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        $tim_arsa = CustomerService::where('status', '=', '1')->select('name', 'image', 'jabatan','status')->get();

        return view('about', [
            "active" => 'tentang',
            "teams" => $tim_arsa
        ]);
    }
    
    public function location(){
        return redirect("https://maps.app.goo.gl/fFB1MR7jP6cGXu8R9");
    }
    public function socialAdmin(){
        return redirect("https://api.whatsapp.com/send/?phone=6282325613477&text&type=phone_number&app_absent=0");
    }
    
    public function download(){
        SEOTools::setTitle('Download Company Profile| Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('PT Arsa Jaya Prima penyedia pelatihan & sertifikasi K3 dan berbagai training softskill dibawah lisensi resmi KEMNAKER RI dan BNSP');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        SEOMeta::addKeyword(['Download Company Profile']);
        $document =  Document::where('type', 'Company Profile')->latest()->first();
        $filePath =  'storage/'.$document->file;
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Company Profile Arsa Training.pdf';
        return response()->download($filePath, $fileName, $headers);
    }
}
