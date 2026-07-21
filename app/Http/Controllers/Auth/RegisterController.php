<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    protected $redirectTo = '/otp';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
            'konfirmasi_password' => 'required|same:password'
        ], [
            'email.unique' => 'Email sudah terdaftar.',
            'password.regex' => 'Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.',
            'konfirmasi_password.same' => 'Konfirmasi kata sandi tidak cocok.'
        ]);

        $pengguna = User::where('username', '=', $request->username)->first();
        if ($pengguna) {
            return response()->json([
                'status' => 'error',
                'error' => 'Pengguna sudah terdaftar'
            ], 401);
        }
        $email = User::where('email', '=', $request->email)->first();
        if ($email) {
            return response()->json([
                'status' => 'error',
                'error' => 'Email sudah terdaftar'
            ], 401);
        }
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $request->password)) {
            return response()->json([
                'status' => 'error',
                'error' => 'Password harus minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.'
            ], 401);
        }
        
        if ($request->password != $request->konfirmasi_password) {
            return response()->json([
                'status' => 'error',
                'error' => 'Konfirmasi kata sandi tidak cocok'
            ], 401);
        }

        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ], 422);
        }

        // BUAT USER
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            // LOGIN OTOMATIS DAN AMBIL TOKEN
            if (!$token = Auth::guard('api')->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal login setelah registrasi'
                ], 500);
            }

            // Generate kode jika diperlukan
            $user = Auth::guard('api')->user();
            $user->generateCode();

            return response()->json([
                'status' => 'success',
                'message' => 'User berhasil mendaftar ke aplikasi',
                'id' => $user->id,
                'token' => $token,
                'data' => $user
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Gagal membuat user'
        ], 500);
    }
}
