<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Training;
use Illuminate\Http\Request;

class DashboardEventController extends Controller {
    // public function create() {
    //     $training = Training::onlyTrashed()->where('id', '!=', '0')->get();
    //     return view('dashboard.events.create', [
    //         'title' => "Tambah Jadwal Program Pelatihan dan Pembinaan",
    //         'training' => $training
    //     ]);
    // }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'training_id'   => 'required',
            'scheme'        => 'required',
            'date'          => 'required',
            'location'      =>  'required',
        ]);
        Event::create($validatedData);
        // End Store Data
    
        return back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function destroy($id) {
        // dd($event->id);
        // $event = Event::find($id);
        // $event->destroy($event->id);
        $event = Event::findOrFail($id);
        
        $event->forceDelete();

        return back()->with('success', 'Jadwal berhasil dihapus');
    }
}
