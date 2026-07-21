<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class Check2FA
{
    public function handle(Request $request, Closure $next): Response
    {
        $getUser = User::where('id',Session::get('registerId'))->first();
        
        if($getUser){
            if ($getUser->email_verified_at == null) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Email Belum diverifikasi',
                    'user' => $getUser
                ], 403);
            }
            
        }
        
        return $next($request);
    }
}
