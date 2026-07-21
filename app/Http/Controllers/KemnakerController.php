<?php

namespace App\Http\Controllers;

use App\Models\KategoriSertifikasi;
use App\Models\Training;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class KemnakerController extends Controller
{
    public function index()
    {
        SEOMeta::addKeyword(['Sertifikasi KEMNAKER', 'juru las', ' ahli k3 umum']);
        SEOTools::setTitle('Sertifikasi Kemnaker RI | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Pelatihan K3 Sertifikasi KEMNAKER RI Program : Juru Las, Ahli K3 Umum, Ahli K3 Listrik, Teknisi K3 Listrik, Auditor SMK3, K3 Konstruksi, Pemadam Kebakaran dll');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        $training_mobile = Training::where([['training_categories_id', '=', 1],['kategori_sertifikasi', '!=', 'Perpanjangan SIO/Lisensi/SKP']])->latest()->filter(request(['search', 'kategori']))->paginate(5)->withQueryString();
        $training = Training::where([['training_categories_id', '=', 1],['kategori_sertifikasi', '!=', 'Perpanjangan SIO/Lisensi/SKP']])->latest()->filter(request(['search', 'kategori']))->get();
        $kategori_sertifikasi =  KategoriSertifikasi::where('training_categories_id', 1)->get();
        $kategori_terpilih = KategoriSertifikasi::where([
            ['training_categories_id', '=', 1],
            ['nama_kategori', '=', 'Semua']
        ])->first();
        if (request(['search'])) {
            $training_result = Training::where('training_categories_id', 1)->latest()->filter(request(['search']))->paginate(7)->withQueryString();
            return view('trainingcategories', [
                "title" => "Kemnaker",
                "trainings" => null,
                "kategori" => $kategori_sertifikasi,
                "training_mobile" => $training_mobile,
                "kategori_terpilih" => $kategori_terpilih,
                "training_result" => $training_result
            ]);
        }
        return view('trainingcategories', [
            "title" => "Kemnaker",
            "trainings" => $training,
            "kategori" => $kategori_sertifikasi,
            "training_mobile" => $training_mobile,
            "kategori_terpilih" =>  $kategori_terpilih,
            "training_result" => null,
        ]);
    }

    public function kategori($kategori_sertifikasi)
    {
        SEOMeta::addKeyword(['Sertifikasi Kemnaker RI', $kategori_sertifikasi]);
        SEOTools::setTitle('Sertifikasi Kemnaker RI Program ' . $kategori_sertifikasi . ' | Arsa Training & Consulting');
        SEOTools::setDescription('Pelatihan Sertifikasi Kemnaker RI Program : ' . $kategori_sertifikasi . '., PPPU & POIPU, K3 Rumah Sakit, Ahli K3 Umum, POPAL, PPPA, HACCP, LCA, PPLB3|OPLB3, POP | POM | POU, dll.');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        $training_mobile = Training::where([['training_categories_id', '=', 1], ['kategori_sertifikasi', '!=', 'Perpanjangan SIO/Lisensi/SKP']])->with('kategori')->where('kategori_sertifikasi', '=', $kategori_sertifikasi)->latest()->filter(request(['search', 'kategori']))->paginate(5)->withQueryString();
        $training = Training::where([['training_categories_id', '=', 1], ['kategori_sertifikasi', '!=', 'Perpanjangan SIO/Lisensi/SKP']])->with('kategori')->where('kategori_sertifikasi', '=', $kategori_sertifikasi)->latest()->filter(request(['search', 'kategori']))->get();
        $kategori_terpilih = KategoriSertifikasi::where([
            ['training_categories_id', '=', 1],
            ['nama_kategori', '=', $kategori_sertifikasi]
        ])->first();
        $kategori_all =  KategoriSertifikasi::where('training_categories_id', 1)->get();
        if (request(['search'])) {
            $training_result = Training::where([['training_categories_id', '=', 1], ['kategori_sertifikasi', '!=', 'Perpanjangan SIO/Lisensi/SKP']])->with('kategori')->latest()->filter(request(['search']))->paginate(7)->withQueryString();
            return view('trainingcategories', [
                "title" => "Kemnaker",
                "trainings" => null,
                "kategori" => $kategori_all,
                "training_mobile" => $training_mobile,
                "kategori_terpilih" => $kategori_terpilih,
                "training_result" => $training_result
            ]);
        }
        return view('trainingcategories', [
            "title" => "Kemnaker",
            "trainings" => $training,
            "kategori" => $kategori_all,
            "training_mobile" => $training_mobile,
            "kategori_terpilih" => $kategori_terpilih,
            "training_result" => null,
        ]);
    }
}
