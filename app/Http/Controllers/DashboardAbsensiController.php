<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pelatihan;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardAbsensiController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        Schedule::where('start_date', $today)
            ->update(['is_open' => 'Buka']);
        Schedule::where('end_date', '<', $today)
            ->update(['is_open' => 'Selesai']);

        $pelatihan = Pelatihan::join('users','users.id','=','pelatihans.user_id')
            ->join('trainings', 'pelatihans.training_id', '=', 'trainings.id')
            ->join('schedules', 'schedules.training_id', '=', 'trainings.id')
            ->select('users.username','users.no_telp','trainings.name', 'schedules.*')
            ->get();

        return view('dashboard.absensi.index', [
            'title' => 'Daftar Absensi Peserta',
            "absensi" => $pelatihan
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
