<?php
namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Ads;
use App\Models\Facility;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\Training;
use App\Models\Client;
use App\Models\OngoingTraining;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Cache;
use App\Models\Layanan;
use Carbon\Carbon;

class DemoController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['sertifikasi k3',' pelatihan k3', 'sertifikasi KEMNAKER', 'sertifikasi BNSP']);
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
            return Training::select('name', 'slug', 'thumbnail','thumbnail_mobile', 'excerpt','platform','deskripsi_persyaratan','home_view')->with('kategori')->where('training_categories_id', '1')->orderBy('created_at')->get();
        });
        
        $bnsp = Cache::remember('bnsp_home', 60, function () {
            return Training::select('name', 'slug', 'thumbnail','thumbnail_mobile','excerpt','platform','deskripsi_persyaratan','home_view')->with('kategori')->where('training_categories_id', '2')->orderBy('created_at')->get();
        });
        
        $softskills = Cache::remember('softskill_home', 60, function () {
            return Training::select('name', 'slug', 'thumbnail','thumbnail_mobile', 'excerpt','platform','deskripsi_persyaratan','home_view')->with('kategori')->where('training_categories_id', '3')->orderBy('created_at')->get();
        });
        
        $schedule = Cache::remember('schedule_home', 60, function () {
            return Schedule::select('name', 'image','training_id','start_date','end_date')->with('training')->orderBy('start_date','asc')->get();
        });
        
        $facility = Cache::remember('facility_home', 60, function () {
            return Facility::select('name', 'image','image_mobile')->where('status', '1')->get();
        });

        $review = Cache::remember('testimonial_home', 60, function () {
            return Review::select('id','name', 'image', 'review', 'company', 'training')->where('image','!=',null)->get();
        });

        $layanan = Cache::remember('layanan_home', 60, function () {
            return Layanan::select('title', 'icon', 'description')->get();
        });
        
        $slider = Cache::remember('slider_home', 60, function () {
            return Slider::select('title', 'image','image_mobile')->where('status', '1')
            ->orderBy('updated_at','desc')->get();
        });
        
        $client = Cache::remember('client_home',60, function(){
            return Client::select('name','image')->get();
        });
        
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $today = Schedule::select('start_date')->get();
        $jmlHari = $today->count();
        for ($i = 0; $i < $jmlHari; $i++) {
            $startDate = Carbon::parse($today[$i]->start_date);
            $endDate = $startDate->copy()->subDays(6);
            if (Carbon::now()->gt($endDate)) {
                $selectDate = Schedule::where('start_date', $today[$i]->start_date)->delete();
            }
        }
        
        $ongoing = Cache::remember('ongoing',60, function(){
            return OngoingTraining::select('image','name','jumlah_peserta','platform','start_date','end_date','training_id')->orderBy('start_date','desc')->get();
        });
        
        return view('home', [
            "reviews"    => $review,
            "facilities"  => $facility,
            "kemnaker"    => $kemnaker,
            "bnsp"    => $bnsp,
            "softskills"    => $softskills,
            "layanans" => $layanan,
            "banner"    => $slider,
            "schedules" => $schedule,
            "clients" => $client,
            "ongoing" => $ongoing
        ]);
    }
}
