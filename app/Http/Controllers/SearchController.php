<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Training;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class SearchController extends Controller
{
    public function index()
    {

        SEOTools::setTitle('Sertifikasi Kemnaker RI | Arsa Consultant', 'Arsa Consultant');
        SEOTools::setDescription('Program Sertifikasi Kemnaker RI termasuk ke dalam program yang dapat diselenggarakan oleh Arsa Consultant.');
        // SEOTools::opengraph()->setUrl('https://pusatpelatihank3.co.id/sertifikasi-kemnaker-ri');
        // SEOTools::setCanonical('https://pusatpelatihank3.co.id/sertifikasi-kemnaker-ri');
        // SEOTools::jsonLd()->addImage('https://pusatpelatihank3.co.id/img/logo.webp');
        
        SEOMeta::addKeyword(['sertifikasi k3', 'pelatihan k3', ' keselamatan kerja', 'pelatihan keselamatan kerja', 'sertifikasi kemnaker ri']);

        // dd(request('search'));

        // $training = Training::where('training_categories_id', 1)->latest()->get();
        // $trainings = Training::where('training_categories_id', 1)->orderBy('id', 'DESC')->filter(request(['search']))->paginate(4)->withQueryString();

        $training = Training::latest()->filter(request(['search']))->paginate(7)->withQueryString();
        $post = Post::latest()->filter(request(['search']))->paginate(7)->withQueryString();

        // $keyword = $request->search;
        // $training = Training::where('name', $keyword)->orWhere('description', $keyword)->paginate(7);

        

        return view('search', [
            // "title" => $title ,
            "trainings" => $training,
            "posts" => $post
            // "trainings" => $trainings
        ]);
    }
}
