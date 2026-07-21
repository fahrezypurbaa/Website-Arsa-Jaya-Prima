<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class LocationController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['Lokasi Training', 'Lokasi Sertifikasi']);
        SEOTools::setTitle('Lokasi Training | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Pilih Lokasi Training di Berbagai Lokasi, Jakarta : Asyana Kemayoran Hotel, Bandung : Hotel Gino Feruci, Bandung : Noor Hotel, Yogyakarta : BLPT, Bali :Neo+ Kuta Legian dll');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $location = Place::paginate(5)->withQueryString();
        $locationDaerah = Place::select('city')->groupBy('city')->get();

        return view('location', [
            'places' => $location,
            'places_location' => $locationDaerah
        ]);
    }

    public function show(Place $location) {
        SEOTools::setTitle($location->name, 'Arsa Training');
        SEOTools::setDescription($location->desc);
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        SEOMeta::addKeyword([$location->name]);
        
        $images = $location->images;
        
        return view('location-detail', [
            "title" => $location->name,
            "active" => 'location',
            "location" => $location
        ], compact('images'));
        
    }

    public function showRegion($location) {
        SEOMeta::addKeyword(['Lokasi Training '.$location, 'Lokasi Sertifikasi '.$location]);
        SEOTools::setTitle('Lokasi Training '.$location.' untuk Kegiatan Pelatihan di Arsa Training & Consulting');
        SEOTools::setDescription('Pilih Lokasi Training di '. $location .' : Asyana Kemayoran Hotel, Bandung : Hotel Gino Feruci, Bandung : Noor Hotel, Yogyakarta : BLPT, Bali :Neo+ Kuta Legian dll');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        $locations = Place::where('city','=', $location)->paginate(5);
        $locationDaerah = Place::select('city')->groupBy('city')->get();
        return view('location', [
            'places' => $locations,
            'lokasi'=> $location,
            'places_location' => $locationDaerah
        ]);
        
    }


}
