<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;
class LokerController extends Controller
{
    public function index()
    {
        SEOMeta::addKeyword(['sertifikasi k3', 'pelatihan k3', ' keselamatan kerja', 'pelatihan keselamatan kerja', 'sertifikasi juru las', 'ahli k3 umum', 'k3 pengolahan limbah']);
        SEOTools::setTitle('Info Lowongan Kerja| Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Kumpulan informasi dan referensi buat kamu yang sedang mencari lowongan pekerjaan seputar dunia kerja dan bidang lainya');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $lokers = Loker::take(6)->get();
        return view('loker',['lokers'=> $lokers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Loker $loker)
    {
        SEOMeta::addKeyword("Loker");
        SEOTools::setTitle($loker->title, 'Arsa Training & Consulting');
         SEOTools::setDescription('Kumpulan informasi dan referensi buat kamu yang sedang mencari lowongan pekerjaan seputar dunia kerja di '.$loker->title);
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical(URL::current());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        SEOMeta::addKeyword("Loker");
        return view('loker-detail', [
            "title" => $loker->title,
            "loker" => $loker,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
