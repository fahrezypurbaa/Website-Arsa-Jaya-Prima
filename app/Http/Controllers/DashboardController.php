<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\BnspCertification;
use App\Models\KemnakerCertification;
use App\Models\Message;
use App\Models\InhouseRegistrant;
use App\Models\Post;
use App\Models\Softskill;

class DashboardController extends Controller
{
    public function index()
    {
        Artisan::call('route:clear');
        $softskill = Softskill::where('progress', '=', 'Belum')->count();
        $kemnaker = KemnakerCertification::where('progress', '=', 'Belum')->count();
        $bnsp = BnspCertification::where('progress', '=', 'Belum')->count();

        return view('dashboard.index', [
            "title" => "Dashboard",
            'messages' => Message::where('progress', '=', 'Belum')->latest()->take(10)->get(),
            'inhouse' => InhouseRegistrant::where('progress', '=', 'Belum')->latest()->take(10)->get(),
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->take(10)->get(),
            'softskill' => $softskill,
            'kemnaker' => $kemnaker,
            'bnsp' => $bnsp
        ]);
    }
}
