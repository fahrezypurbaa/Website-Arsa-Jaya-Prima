<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ContactController extends Controller
{
    public function index() {
        SEOMeta::addKeyword(['Hubungi Kami', 'Kontak Kami', ' Kontak Arsa Training']);
        SEOTools::setTitle('Kontak Kami | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Memiliki pertanyaan atau butuh bantuan mengenai pelatihan dan sertifikasi? Hubungi nomor kami atau isi formulir, kami akan menghubungi Anda sesegera mungkin');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        
        return view('contact', [
            "active" => 'kontak',
        ]);
    }

    public function create()
    {
        $progress = ['Belum','Sudah'];
        return view('contact', compact('progress'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'email' => ['required','email:dns'],
            'message'  => 'required',
            'no_hp' => 'required|numeric|digits:12'
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->message), 50);
        
        Message::create($validatedData);

        return redirect('/kontak-kami')->with('success', 'Pesan Anda akan kami balas segera!');
    }

    public function contact(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'email' => ['required','email:dns'],
            'message'  => '',
            'no_hp' => 'required|numeric|min:10|max:13'
        ]);    
        Message::create($validatedData);
        SlugService::createSlug(Message::class, 'slug', $request->name);
        return redirect('/kontak-thanks?form=consult')->with('success', 'Terimakasih sudah menghubungi kami!');
    }
    
    public function contactThanks(Request $request) {
        SEOMeta::addKeyword(['Thank You', 'Thank You', ' Kontak Arsa Training']);
        SEOTools::setTitle('Thank You | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Selamat, formulir Anda sudah terkirim.
        Mohon ditunggu selama beberapa jam kedepan, tim kami akan segera menghubungimu');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        $name = $request->query('form');
       return view('contact-thanks',['thanks'=>$name]);
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Message::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
