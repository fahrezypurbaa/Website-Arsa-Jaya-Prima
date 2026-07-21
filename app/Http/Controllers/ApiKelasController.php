<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ApiKelasController extends Controller
{
    public function index()
    {
        $getId = Auth()->user()->id;
        $pelatihan = Pelatihan::where('pelatihans.user_id', '=', $getId)
        ->whereNotNull('pelatihans.tanggal_mulai')
        ->where('role','=','Peserta')
        ->join('trainings', 'trainings.id', '=', 'pelatihans.training_id')
        ->join('training_categories', 'training_categories.id', '=', 'trainings.training_categories_id')
        ->select(
            'pelatihans.id',
            'trainings.name',
            'pelatihans.tanggal_mulai',
            'pelatihans.tanggal_selesai',
            'training_categories.name as kategori',
            DB::raw('
                CASE
                    WHEN NOW() = pelatihans.tanggal_mulai THEN "Sedang berlangsung"
                    WHEN NOW() > pelatihans.tanggal_selesai THEN "Selesai"
                    ELSE "Belum berlangsung"
                END as status'
            )
        )
        ->get();
    
        // atur zona waktu
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        if($pelatihan){
            return response()->json([
                'status'=>'success',
                'message'=>'Pelatihan berhasil ditampilkan',
                'results'=> $pelatihan
            ],200);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Anda tidak terdaftar di dalam pelatihan',
            ],404);
        }
    }

    public function filterKelas(Request $request)
    {
        $getId = Auth()->user()->id;
        $pelatihan = Pelatihan::where('pelatihans.user_id', '=', $getId)
        ->where('role','=','Peserta')
        ->join('trainings', 'trainings.id', '=', 'pelatihans.training_id')
        ->join('training_categories', 'training_categories.id', '=', 'trainings.training_categories_id')
        ->select(
            'pelatihans.id',
            'trainings.name',
            'pelatihans.tanggal_mulai',
            'pelatihans.tanggal_selesai',
            'training_categories.name as kategori',
            DB::raw('
                CASE
                    WHEN NOW() BETWEEN pelatihans.tanggal_mulai AND pelatihans.tanggal_selesai THEN "Sedang berlangsung"
                    WHEN NOW() > pelatihans.tanggal_selesai THEN "Selesai"
                    ELSE "Belum berlangsung"
                END as status')
        )
        ->having('status', '=', $request->status)
        ->get();
    
        // atur zona waktu
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        if($pelatihan){
            return response()->json([
                'status'=>'success',
                'message'=>'Pelatihan berhasil ditampilkan',
                'results'=> $pelatihan
            ],200);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Anda tidak terdaftar di dalam pelatihan',
            ],404);
        }
    }


    public function show(string $id)
    {
        $pelatihan = Pelatihan::where('pelatihans.id','=',$id)
        ->join('trainings', 'trainings.id', '=', 'pelatihans.training_id')
        ->join('training_categories', 'training_categories.id', '=', 'trainings.training_categories_id')
        ->join('users', 'users.id', '=', 'pelatihans.user_id')
        ->select( 'pelatihans.id',
        'trainings.name',
        'trainings.platform',
        'pelatihans.tanggal_mulai',
        'pelatihans.tanggal_selesai',
        'training_categories.name as kategori',
        'pelatihans.tempat',
            DB::raw('
                CASE
                    WHEN NOW() = pelatihans.tanggal_mulai THEN "Sedang berlangsung"
                    WHEN NOW() > pelatihans.tanggal_selesai THEN "Selesai"
                    ELSE "Belum berlangsung"
                END as status'),
            DB::raw('
                CASE
                    WHEN users.berkas IS NULL THEN "Belum Lengkap"
                    ELSE "Sudah Lengkap"
                END as berkas')
            )
        ->first();
        return response()->json([
            'status'=>'success',
            'message'=>'Pelatihan berhasil ditampilkan',
            'results'=> $pelatihan
        ],200);
    }
}
