<?php

namespace App\Http\Controllers;

use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelatihan;
use App\Models\Training;
use App\Models\Schedule;

class ApiHomeController extends Controller
{
    public function notify()
    {
        $user = User::where('id',Auth()->user()->id)->first();
        $user->notify(new UserNotification($user));
        return response()->json([
            'user' => $user,
        ]);
    }
    
    public function data()
    {
        $jml_peserta = Pelatihan::where('role', '=', 'peserta')->count();
        $jml_pendaftar = Pelatihan::where('role', '=', 'pendaftar')->count();
        $jml_program = Training::count();
        $jadwal = Schedule::orderBy('start_date', 'asc')->first();
        return response()->json([
            'result' => [
                'jml_peserta' => $jml_peserta,
                'jml_pendaftar' => $jml_pendaftar,
                'jml_program' => $jml_program,
                'jadwal_terbaru' => $jadwal
            ],
            "message" => "Berhasil Menampilkan Data",
            "status" => "Success"
        ], 200);
    }


    public function show(){
        return response()->json([
            'results' => Auth()->user()->notifications,
        ]);
    }
    
     

    public function markAsRead($notificationId)
    {
        $user = auth()->user(); 

        if ($user) {
            $notification = $user->unreadNotifications->where('id', $notificationId)->first();
            if ($notification) {
                $notification->markAsRead();
            } else {
                return response()->json(['message' => 'Notification not found.'], 404);
            }
        } else {
            return response()->json(['message' => 'User not found.'], 404);
        }

        return response()->json([
            'message' => 'Notification marked as read.',
            'user' => $user
        ]);
    }

}
