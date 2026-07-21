<?php
namespace App\Http\Controllers;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class ApiUserCodeController extends Controller{
    use AuthenticatesUsers;
    public function index()
    {
        return response()->json([
            "status" => "success",
            "message" => "Kode OTP Berhasil dikirim!",
        ], 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'code' => 'required|min:6',
            'userId' => 'required'
        ]);
        
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Minimal jumlah karakter adalah 6',
                'error'=> 'Minimal jumlah karakter adalah 6'
            ], 422);
        }

        $find = UserCode::where('user_id', $request->userId)
        ->where('code', $request->code)
        ->where('updated_at', '>=', now()->subMinutes(5))
        ->first();
        
        if (!is_null($find)) {
            Session::put('authenticated', Session::get('registerId'));
            $getUser = User::where('id',$request->userId)->first();
            $timeNow = Carbon::now();
            $getUser->update(['email_verified_at' => $timeNow]);
            return response()->json([
                'status' => 'success',
                'message' => 'Kode OTP benar!',
                'user' => $find
            ], 200);
        }
        
        
        return response()->json([
            'status' => 'error',
            'message' => 'Kode OTP salah!',
        ], 401);
    }

    public function resend()
    {
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated'
            ], 401);
        }
        if($user->email_verified_at == null){
            $user->generateCode();
            return response()->json([
                "status" => "success",
                "message" => "We sent you code on your email.",
            ], 200);
        }
        else{
            return response()->json([
                "status" => "error",
                "message" => "Email Anda sudah diverifikasi",
            ], 403);
        }
       
    }

    public function profile(){
        return response()->json(Auth::guard('api')->user());
    }
}
