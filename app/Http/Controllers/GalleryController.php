<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\GalleryDetail;
use App\Models\OngoingTraining;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    public function index()
    {
        SEOMeta::addKeyword(['sertifikasi k3',' sertifikasi bnsp', 'training softskill', 'galeri pelatihan k3']);
        SEOTools::setTitle('Galeri | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Kumpulan Galeri Pelatihan dan Pembinaan yang diselenggarakan oleh Arsa Training & Consulting');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        $galleries = OngoingTraining::select('image', 'platform', 'start_date', 'end_date', 'name', 'training_id')->with('training')->latest()->get();
        return view('gallery',compact('galleries'));
    }
    public function show($id)
    {
        SEOMeta::addKeyword(['sertifikasi k3',' sertifikasi bnsp', 'training softskill', 'galeri pelatihan k3 bulan'.$id]);
        SEOTools::setTitle('Foto Galeri Bulan '.$id.' | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Galeri Pelatihan dan Pembinaan bulan '.$id.' yang diselenggarakan oleh Arsa Training & Consulting');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://arsatraining.com/img/company-logo.webp');

        $data = GalleryDetail::where('gallery_category_id', $id)->filter(request(['gallery_categories']))->get();
        
        $category = GalleryDetail::where('gallery_category_id', $id)->first();

        return view('gallery-detail', [
            'data'      => $data,
            'category'  => $category,
            'id'        => $id        
        ]);
    }
}
