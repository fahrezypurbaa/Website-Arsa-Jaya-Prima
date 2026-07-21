<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;

class DashboardScheduleController extends Controller
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
            $endDateAdjusted = $startDate->copy()->subDays(2);
            if (Carbon::now()->gt($endDateAdjusted)) {
                Schedule::where('start_date', $today[$i]->start_date)
                    ->update(['display' => 0]);
            }
            if (Carbon::now()->gt($endDate)) {
                Schedule::where('start_date', $today[$i]->start_date)->delete();
            }
        }
        return view('dashboard.schedules.index', [
            'title' => 'Jadwal Training',
            'schedules' => Schedule::all(),
        ]);
    }
    public function create()
    {
        $training = Training::all();
        return view('dashboard.schedules.create', [
            'title' => "Tambah Jadwal Training",
            'trainings' => $training
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'training_id' => 'required',
            'name' =>  'required',
            'slug'  =>  'unique:schedules',
            'image' => 'image|file|webp:mimes',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('schedule->images');
        }

        Schedule::create($validatedData);

        return redirect('/dashboard/schedules')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show(Schedule $schedule)
    {
        return view('dashboard.schedules.show', [
            "title" => "Preview Jadwal",
            'schedule'  => $schedule
        ]);
    }

    public function edit(Schedule $schedule)
    {
        return view('dashboard.schedules.edit', [
            'title' => "Edit Jadwal Training",
            'schedule' => $schedule,
            'trainings' => Training::all()
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $rules = [
            'training_id' => 'required',
            'name' =>  'required',
            'image' => 'image|file|mimes:webp',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_open' => ''
        ];

        if ($request->slug != $schedule->slug) {
            $rules['slug'] = 'required|unique:schedules';
        }

        $validatedData = $request->validate($rules);


        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('schedule->images');
        }

        Schedule::where('id', $schedule->id)->update($validatedData);

        return redirect('/dashboard/schedules')->with('success', 'Jadwal berhasil diperbaharui!');
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->image) {
            Storage::delete($schedule->image);
        }
        Schedule::destroy($schedule->id);

        return redirect('/dashboard/schedules')->with('success', 'Jadwal berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Schedule::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
