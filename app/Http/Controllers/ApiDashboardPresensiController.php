<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Schedule;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiDashboardPresensiController extends Controller
{

    public function index()
    {
        $today = Carbon::today();
        Schedule::where('start_date', $today)
            ->update(['is_open' => 'Buka']);
        Schedule::where('end_date', '<', $today)
            ->update(['is_open' => 'Selesai']);

        $pelatihan = Absensi::join('pelatihans', 'pelatihan_id', '=', 'pelatihans.id')
            ->join('users', 'users.id', '=', 'pelatihans.user_id')
            ->join('trainings', 'pelatihans.training_id', '=', 'trainings.id')
            ->join('schedules', 'schedules.training_id', '=', 'trainings.id')
            ->select('absensis.*','users.username', 'users.no_telp', 'trainings.name','absensis.foto_absensi')
            ->get();

        if (!$pelatihan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Daftar Presensi Peserta Tidak Ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Daftar Presensi Berhasil Ditampilkan',
            'results' => $pelatihan
        ], 200);
    }
    
    public function show(string $id)
    {
        $absensi = Absensi::leftJoin('pelatihans', 'pelatihan_id', '=', 'pelatihans.id')
            ->leftJoin('users', 'users.id', '=', 'pelatihans.user_id')
            ->leftJoin('trainings', 'pelatihans.training_id', '=', 'trainings.id')
            ->leftJoin('schedules', 'schedules.training_id', '=', 'trainings.id')
            ->where('absensis.id', '=', $id)
            ->select('absensis.*', 'users.username', 'users.no_telp', 'trainings.name', 'absensis.foto_absensi')
            ->first();
        if ($absensi) {
            return response()->json([
                'status' => 'success',
                'message' => 'Absensi berhasil ditampilkan',
                'result' => $absensi
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Presensi tidak ditemukan',
            ], 404);
        }
    }
    
    public function destroy(string $id)
    {
        $absensi = Absensi::where('id', $id);
        $absensi->delete();
        if ($absensi) {
            return response()->json([
                'status' => 'success',
                'message' => 'Presensi berhasil dihapus',
            ], 200);
        }
    }
}
