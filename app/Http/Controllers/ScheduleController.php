<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Cache;
use App\Models\Training;


class ScheduleController extends Controller
{
    public function index() {
        SEOTools::setTitle('Jadwal Training | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Cek jadwal terdekat pelaksanaan training dan sertifikasi KEMNAKER RI, BNSP dan Softskill. Daftarkan dirimu sekarang juga');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        SEOTools::setCanonical(URL::full());
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        SEOMeta::addKeyword(['Jadwal Training']);
        $list_schedule = Cache::remember('schedule_home', 60, function () {
            return Schedule::select('name', 'image','training_id','start_date','end_date')->with('training')->orderBy('start_date','asc')->where('display','=',1)->get();
        });
        $schedule = Cache::remember('schedule_page', 60, function () {
            return Schedule::orderBy('schedules.created_at')->where('display','=',1)->get();
        });
        $kemnaker = Cache::remember('kemnaker_home', 60, function () {
            return Training::select('id','name', 'slug', 'thumbnail','thumbnail_mobile', 'excerpt','platform','deskripsi_persyaratan','home_view')->with('kategori')->where('training_categories_id', '1')->orderBy('created_at')->get();
        });
        
        $bnsp = Cache::remember('bnsp_home', 60, function () {
            return Training::select('id','name', 'slug', 'thumbnail','thumbnail_mobile','excerpt','platform','deskripsi_persyaratan','home_view')->with('kategori')->where('training_categories_id', '2')->orderBy('created_at')->get();
        });
        
        $softskills = Cache::remember('softskill_home', 60, function () {
            return Training::select('id','name', 'slug', 'thumbnail','thumbnail_mobile', 'excerpt','platform','deskripsi_persyaratan','home_view')->with('kategori')->where('training_categories_id', '3')->orderBy('created_at')->get();
        });

        return view('schedules', [
            "schedules" => $schedule,
            "list_schedule" => $list_schedule,
            "kemnaker"    => $kemnaker,
            "bnsp"    => $bnsp,
            "softskills"    => $softskills,
        ]);
    }
    
    public function download(){
        SEOTools::setTitle('Download Jadwal| Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('PT Arsa Jaya Prima penyedia pelatihan & sertifikasi K3 dan berbagai training softskill dibawah lisensi resmi KEMNAKER RI dan BNSP');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        SEOMeta::addKeyword(['Download Jadwal']);
        // $document =  Document::where('type', 'Jadwal')->latest()->first();
        $document = Document::where('type', 'Jadwal')->orderBy('id', 'desc')->first();
        $filePath =  'storage/'.$document->file;
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Jadwal Training Annual Arsa Training.pdf';
        return response()->download($filePath, $fileName, $headers);
    }
    
    public function proposal(){
        SEOTools::setTitle('Proposal Penawaran Kerjasama | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Proposal Penawaran Kerjasama sertifikasi KEMNAKER RI, BNSP dan Softskill. Daftarkan dirimu sekarang juga');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        SEOMeta::addKeyword(['Proposal Penawaran Kerjasama']);
        $document =  Document::where('type', 'Proposal')->latest()->first();
        $filePath = 'https://docs.google.com/gview?embedded=true&url=https://www.arsatraining.com/storage/'.$document->file.'&amp;embedded=true';
        return view('viewPdf', [
            "title" => "Proposal",
            "file" => $filePath,
        ]);
    }

    public function companyProfile(){
        SEOTools::setTitle('Company Profile | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('PT Arsa Jaya Prima penyedia pelatihan & sertifikasi K3 dan berbagai training softskill dibawah lisensi resmi KEMNAKER RI dan BNSP');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        SEOMeta::addKeyword(['Company Profile']);
        $document =  Document::where('type', 'Company Profile')->latest()->first();
        // $filePath = 'https://docs.google.com/gview?embedded=true&url=https://www.arsatraining.com/storage/files/company-profile-arsa.pdf&amp;embedded=true';
        $filePath = 'https://docs.google.com/gview?embedded=true&url=https://www.arsatraining.com/storage/'.$document->file.'&amp;embedded=true';
        return view('viewPdf', [
            "title" => "CompanyProfile",
            "file" => $filePath,
        ]);
    }
    
    public function jadwalTahunan(){
        return redirect('https://drive.google.com/file/d/1WwI8R0_9LSo9yi_afQGDjtUPl667Bz--/view?usp=sharing');
    }
    
    public function jadwalTahunan2026(){
        return redirect('https://drive.google.com/file/d/1P_1gS5jJslR2B0y4DdXVMZboyX6Acn8D/view?usp=sharing');
    }
}
