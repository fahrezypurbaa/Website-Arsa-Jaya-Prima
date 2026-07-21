<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
class ApiGoogleLoginController extends Controller
{
    use AuthenticatesUsers;

    public function loginGoogle(Request $request)
    {
        try {
            // Find user by Google ID
            $findUser = User::where('google_id', $request->google_id)->first();

            if ($findUser) {
                // Login the user
                Auth::login($findUser);
                // Set token TTL (Time to Live)
                $this->guard()->factory()->setTTL(30 * 24 * 60);
                
                // Attempt to generate a token
                if (!$token = $this->guard()->fromUser($findUser)) {
                    return response()->json(['error' => "Failed to generate token"], 401);
                }

                return $this->respondWithToken($token, $findUser);

            } else {
                // Register new user
                $newUser = User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'google_id' => $request->google_id,
                    'password' => Hash::make('123456dummy')
                ]);

                // Login the newly created user
                Auth::login($newUser);
                $this->guard()->factory()->setTTL(30 * 24 * 60);

                // Generate token
                $token = $this->guard()->fromUser($newUser);

                return $this->respondWithToken($token, $newUser);
            }

        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage() // Provide a meaningful error message
            ], 422);
        }
    }

    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'token' => $token,
            'data' => $user,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }
}