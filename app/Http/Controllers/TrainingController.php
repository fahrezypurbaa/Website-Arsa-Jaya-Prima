<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\BnspCertification;
use App\Models\TrainingCategories;
use App\Models\KemnakerCertification;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\InhouseRegistrant;
use App\Models\Softskill;
use App\Models\OngoingTraining;
use App\Models\Schedule;
use App\Models\Gallery;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        SEOMeta::addKeyword(['sertifikasi k3', 'pelatihan k3', ' keselamatan kerja', 'pelatihan keselamatan kerja', 'sertifikasi juru las', 'ahli k3 umum', 'k3 pengolahan limbah']);
        SEOTools::setTitle('Program Pelatihan Dan Pembinaan | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Program Sertifikasi Kemnaker RI, Sertifikasi BNSP, dan Training Softskill yang tersedia di Arsa Training & Consulting');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->setSiteName('PT. Arsa Jaya Prima');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');
        
        $title = '';
 
        if(request('training_categories')) {
             $training_categories = TrainingCategories::firstWhere('slug', request('kategori'));
             $title = ' in ' . $training_categories->name;
        }

        $training = Training::where('id', '!=', '0')
                    ->filter(request(['kategori']))
                    ->paginate(9)->withQueryString();
 
         return view('alltrainingcategories', [
             "title" => "Pelatihan dan Pembinaan" . $title,
             "active" => 'training',
             'training_categories' => TrainingCategories::where('id', '!=', '4')->get(),
             // == solve N+1 problem == //
            //  "trainings" =>  Training::latest()->filter(request(['kategori']))->paginate(9)->withQueryString()
            "trainings" => $training
         ]);
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Training $training)
    {
        if ($training->training_categories_id == '1') {
            // Store Data
            $validatedData = $request->validate([
                'name' =>  'required|max:255',
                'slugKemnaker'  =>  'required|unique:kemnaker_certifications',
                'email' => ['required','email:dns'],
                'phone'  => 'required',
                'company'  => 'nullable',
                'company_address'  => 'nullable',
                'training_id'  => 'required',
                'kategori_peserta' => 'required',
                'sumber_informasi' => 'nullable',
                'kategori_paket' => 'nullable'
            ]);
            KemnakerCertification::create($validatedData);
            // End Store Data
        
            return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
        } elseif ($training->training_categories_id == '2') {
            $validatedData = $request->validate([
                'name' =>  'required|max:255',
                'slugBnsp'  =>  'required|unique:bnsp_certifications',
                'email' => ['required','email:dns'],
                'phone'  => 'required',
                'company'  => 'nullable',
                'company_address'  => 'nullable',
                'training_id'  => 'required',
                'kategori_peserta' => 'required',
                'sumber_informasi' => 'nullable',
                'kategori_paket' => 'nullable'
            ]);
            BnspCertification::create($validatedData);        
            // End Store Data
        
            return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
        } else {
            $validatedData = $request->validate([
                'name' =>  'required|max:255',
                'slugSoftskill'  =>  'required|unique:softskills',
                'email' => ['required','email:dns'],
                'phone'  => 'required',
                'company'  => 'nullable',
                'company_address'  => 'nullable',
                'training_id'  => 'required',
                'kategori_peserta' => 'required',
                'sumber_informasi' => 'nullable',
                'kategori_paket' => 'nullable'
            ]);
            Softskill::create($validatedData);
            // End Store Data
        
            return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
        }
    }
    
    
    public function storeKemnaker(Request $request, Training $training)
    {
        // Store Data
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slugKemnaker'  =>  'required|unique:kemnaker_certifications',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'company'  => 'nullable',
            'company_address'  => 'nullable',
            'training_id'  => 'required',
        ]);
        KemnakerCertification::create($validatedData);
        // End Store Data
        return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
    }
    
    public function save(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slugInhouse'  =>  'required|unique:inhouse_registrants',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'company'  => 'nullable',
            'company_address'  => 'nullable',
            'participant'  => 'nullable',
            'training_id'  => 'required',
        ]);
        InhouseRegistrant::create($validatedData);
        // End Store Data
            
        return redirect('/kontak-thanks?form=register')->with('success', 'Terimakasih sudah menghubungi kami!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training) {
        SEOMeta::addKeyword($training->keywords);
        SEOTools::setTitle($training->name, 'Arsa Training & Consulting');
        SEOTools::setDescription($training->meta_desc);
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical(URL::current());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/storage/'.$training->thumbnail, ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::twitter()->addValue('card', 'summary_large_image');
        SEOTools::twitter()->addValue('image', 'https://www.arsatraining.com/storage/'.$training->thumbnail);
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/storage/'.$training->thumbnail);
        SEOMeta::addKeyword([$training->keywords]);
        $jadwals = Schedule::where('training_id', $training->id)->take(2)->oldest()->get();
        return view('program', [
            "title" => $training->name,
            "jadwals" => $jadwals,
            "training" => $training,
        ]);
    }
    public function inhouse()
    {
        SEOMeta::addKeyword(['Pendaftaran Training', 'Pelatihan INHOUSE TRAINING']);
        SEOTools::setTitle('Pendaftaran Sertifikasi INHOUSE TRAINING | Arsa Training & Consulting', 'Arsa Training & Consulting');
        SEOTools::setDescription('Formulir pendaftaran untuk mengikuti pelatihan dan sertifikasi program INHOUSE TRAINING');
        SEOTools::opengraph()->setUrl(URL::full());
        SEOTools::setCanonical(URL::full());
        SEOTools::opengraph()->addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['id_ID', 'en-us']);
        OpenGraph::addImage('https://www.arsatraining.com/img/company-logo.webp', ['height' => 823, 'width' => 854]);
        SEOTools::twitter()->setSite('@arsatraining');
        SEOTools::jsonLd()->addImage('https://www.arsatraining.com/img/company-logo.webp');

        $training = Training::where([['training_categories_id', '!=', 3], ['kategori_sertifikasi','!=','Perpanjangan SIO/Lisensi/SKP' ]])->get();

        return view('inhouse', [
            'training' => $training
        ]);
    }

    public function checkKemnakerSlug(Request $request) {
        $slugKemnaker = SlugService::createSlug(KemnakerCertification::class, 'slugKemnaker', $request->name);

        return response()->json(['slugKemnaker' => $slugKemnaker]);
    }

    public function checkBnspSlug(Request $request) {
        $slugBnsp = SlugService::createSlug(BnspCertification::class, 'slugBnsp', $request->name);

        return response()->json(['slugBnsp' => $slugBnsp]);
    }

    public function checkSoftskillSlug(Request $request) {
        $slugSoftskill = SlugService::createSlug(Softskill::class, 'slugSoftskill', $request->name);

        return response()->json(['slugSoftskill' => $slugSoftskill]);
    }
    
    public function checkInhouseSlug(Request $request) {
        $slugInhouse = SlugService::createSlug(InhouseRegistrant::class, 'slugInhouse', $request->name);

        return response()->json(['slugInhouse' => $slugInhouse]);
    }
}
