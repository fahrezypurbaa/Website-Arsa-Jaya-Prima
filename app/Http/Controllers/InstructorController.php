<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Cache;

class InstructorController extends Controller
{
    public function index()
    {
        SEOMeta::addKeyword(['instruktur pelatihan',' instruktur']);
        SEOTools::setTitle('Instruktur Training | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Berbagai Instruktur Ahli Berlisensi dan Profesional dari PT Arsa Jaya Prima | Daftar sekarang juga disini');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        
        $instructors = Cache::remember('instructor_page', 60, function () {
            return Instructor::all();
        });

        // $instructors = Instructor::all();

        return view('instructor',compact('instructors'));
    }
}
