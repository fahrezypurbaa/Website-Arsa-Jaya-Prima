<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Training;
use App\Models\Client;
use App\Models\Document;
use App\Models\OngoingTraining;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Cache;
use App\Models\Layanan;
use App\Models\Ads;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::addKeyword(['sertifikasi k3', ' pelatihan k3', 'sertifikasi KEMNAKER', 'sertifikasi BNSP']);
        SEOTools::setTitle('Beranda | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Pusat Pelatihan & Sertifikasi KEMNAKER, BNSP dan Softskill. Tersedia lebih dari 50 program training untuk perusahaan dan individu');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $kemnaker = Cache::remember('kemnaker_home', 60, function () {
            return Training::select('id','name', 'slug', 'thumbnail', 'thumbnail_mobile', 'platform', 'deskripsi_persyaratan', 'home_view')->with('kategori')->where('training_categories_id', '1')->orderBy('created_at')->get();
        });

        $bnsp = Cache::remember('bnsp_home', 60, function () {
            return Training::select('id','name', 'slug', 'thumbnail', 'thumbnail_mobile', 'platform', 'deskripsi_persyaratan', 'home_view')->with('kategori')->where('training_categories_id', '2')->orderBy('created_at')->get();
        });

        $softskills = Cache::remember('softskill_home', 60, function () {
            return Training::select('id','name', 'slug', 'thumbnail', 'thumbnail_mobile', 'platform', 'deskripsi_persyaratan', 'home_view')->with('kategori')->where('training_categories_id', '3')->orderBy('created_at')->get();
        });

        $schedule = Cache::remember('schedule_home', 60, function () {
            return Schedule::select('name', 'training_id', 'start_date', 'end_date')->with('training')->orderBy('created_at', 'asc')->where('display','=',1)->get();
        });

        $facility = Cache::remember('facility_home', 60, function () {
            return Facility::select('name', 'image', 'image_mobile')->where('status', '1')->first();
        });

        $review = Cache::remember('testimonial_home', 60, function () {
            return Review::select('id', 'name', 'image', 'review', 'company', 'training')->where('image', '!=', null)->get();
        });

        $layanan = Cache::remember('layanan_home', 60, function () {
            return Layanan::select('title', 'icon', 'description')->get();
        });

        $popup = Cache::remember('popup_home', 60, function () {
            return Document::select('title', 'file', 'type')->where('type', 'popup')->first();
        });

        $client = Cache::remember('client_home', 60, function () {
            return Client::select('name', 'image')->get();
        });
        $ads = Cache::remember('ads_home', 60, function () {
            return Ads::where('status', '1')
                    ->whereNotNull('button')
                    ->whereNotNull('link')
                    ->get();
        });

        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $today = Schedule::select('start_date')->get();
        $end_date = Schedule::select('end_date')->get();
        for ($i = 0; $i <  $today->count(); $i++) {
            $startDate = Carbon::parse($today[$i]->start_date);
            $endDate = $startDate->copy()->subDays(6);
            if (Carbon::now()->gt($endDate)) {
                Schedule::where('start_date', $today[$i]->start_date)->update(['display' => 0]);
            }
            if (Carbon::now() === $end_date) {
                Schedule::where('end_date', $today)->delete();
            }
        }

        $ongoing = Cache::remember('ongoing', 60, function () {
            return OngoingTraining::select('image', 'platform', 'start_date', 'end_date', 'name', 'training_id')->with('training')->orderBy('start_date', 'DESC')->take(4)->get();
        });

        return view('home', [
            "reviews" => $review,
            "facility" => $facility,
            "kemnaker" => $kemnaker,
            "bnsp" => $bnsp,
            "softskills"    => $softskills,
            "layanans" => $layanan,
            "schedules" => $schedule,
            "clients" => $client,
            "ongoing" => $ongoing,
            "popup" => $popup,
            "ads" => $ads
        ]);
    }
}
