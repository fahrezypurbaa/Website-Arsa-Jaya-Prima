<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validation->errors()
            ], 422);
        }
        $credentials = $request->only('email', 'password');
        JWTAuth::factory()->setTTL(30 * 24 * 60);
        $cek_user = User::where('email', $request->email)->first();
        if (!$cek_user) {
            return response()->json([
                'status' => 'error',
                'error' => 'Pengguna tidak ditemukan',
            ], 404);
        }
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'error' => 'Email atau password salah',
            ], 401);
        }
        $user = auth()->guard('api')->user();
        $user->generateCode();
        return $this->respondWithToken($token, $user);
    }
    
    protected function respondWithToken($token, $getUser)
    {
        return response()->json([
            'status' => 'success',
            "message" => "User berhasil masuk ke aplikasi",
            'token_type' => 'bearer',
            'token' => $token,
            'data' => $getUser,
            'user'=>  auth()->guard('api')->user(),
            'expires_in' =>auth()->guard('api')->factory()->getTTL()
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
