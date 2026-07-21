<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiDashboardJadwalController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        $today = Schedule::select('start_date', 'end_date')->get();
        $jmlHari = $today->count();
        for ($i = 0; $i < $jmlHari; $i++) {
            $startDate = Carbon::parse($today[$i]->start_date);
            $endDate = Carbon::parse($today[$i]->end_date);
            $endDateAdjusted = $startDate->copy()->subDays(6);
            if (Carbon::now()->gt($endDateAdjusted)) {
                Schedule::where('start_date', $today[$i]->start_date)
                    ->update(['display' => 0]);
            }
            if (Carbon::now()->gt($endDate)) {
                Schedule::where('start_date', $today[$i]->start_date)->delete();
            }
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Daftar Jadwal Berhasil Ditampilkan',
            'results' => Schedule::all()
        ], 200);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'training_id' => 'required',
            'name' =>  'required',
            'slug'  =>  'unique:schedules',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $jadwal = Schedule::create($validatedData);
        return response()->json([
            'status' => 'success',
            'message' => 'Jadwal Berhasil Ditambahkan',
            'result' => $jadwal
        ], 200);
    }

    public function show(string $id)
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Jadwal berhasil ditampilkan',
            'result' => $schedule
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan',
            ], 404);
        }
        $rules = [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_open' => 'required',
        ];
        if ($request->slug && $request->slug !== $schedule->slug) {
            $rules['slug'] = 'required|unique:schedules,slug';
        }
        $validatedData = $request->validate($rules);
        $schedule->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Jadwal berhasil diupdate',
            'result' => $schedule
        ], 200);
    }


    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jadwal tidak ditemukan',
            ], 404);
        }

        $schedule->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Jadwal berhasil dihapus',
        ], 200);
    }
}
