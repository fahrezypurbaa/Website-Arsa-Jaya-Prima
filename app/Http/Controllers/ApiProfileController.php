<?php

namespace App\Http\Controllers;

use App\Mail\SendCodeResetPasswordMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ApiProfileController extends Controller
{
    public function index()
    {
       return response()->json([
            "status"=>"success",
            "data"=> Auth()->user()
        ],200);
    }
    
    public function findAccount(Request $request){
        $validation = Validator::make($request->all(), [
            'email' => 'required|email:dns',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validation->errors()
            ], 422);
        }
        $user = User::where('email', '=',$request->email)->first();
        if($user){
            return response()->json([
                'status'=>'success',
                'data'=> $user
            ],200);
        }else{
            return response()->json([
                'error'=>'Email tidak ditemukan',
            ],422);
        }
    }
    
     public function otpResetPassword(Request $request){
        $user = User::where("email",'=',$request->email)->first();
        $code = random_int(100000, 999999); 
        UserCode::updateOrCreate(
            ['user_id' => $user->id],
            ['code' => $code]
        );
        try{
            $details = [
              
                'code' => $code,
                'user' => $user->username
            ];
            // kirim kode OTP dan user ke pesan email
            Mail::to($request->email)->send(new SendCodeResetPasswordMail($details));
            return  response()->json([
                "status" => "success",
                "id" => $user->id,
                "message" => "User berhasil mendapatkan otp",
                "data" => $user
            ], 200);
        }catch(\Exception $e){
            info("Error: ". $e->getMessage());
            dd($e);
        }
    }
    
     public function oldPassword(Request $request){
        $user = auth()->user();
        if(Hash::check($request->old_password, $user->password)){
            return response()->json([
                "message" => "User Ditemukan"
            ],200);
        }else{
            return response()->json(['error' => 'Kata sandi salah. Silahkan coba lagi'], 400);
        }
    }

    public function resetPassword(Request $request){
        $user = User::where("id",'=',$request->userId)->first();
        $validation = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'konfirmasi_password' => 'required'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validation->errors()
            ], 422);
        }
        if ($request->password != $request->konfirmasi_password) {
            return response()->json([
                'status' => 'error',
                'error' => 'Konfirmasi kata sandi tidak cocok'
            ], 401);
        }
        $user->password = Hash::make($request->password);
        $user->update();
        return response()->json([
            "status"=>"success",
            "message"=>"Berhasil update password"
        ],200);
    }

    public function update(Request $request)
    {
        // VALIDASI
        $user = User::find(Auth()->user()->id);
        $validation = Validator::make($request->all(), [
            'username' => 'required|string|max:50',
            'email' => 'required|email:dns',
            'alamat' => 'required|string|min:5',
            'no_telp' => 'required|min:12',
            'picture' => 'image'
        ]);
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validation->errors()
            ], 422);
        }
        $username= User::where('username', '=', $request->username)->get();
        $email = User::where('email', '=', $request->email)->get();
        if (count($username) > 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Nama sudah digunakan di akun lain',

            ], 422);
        } else if (count($email) > 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email sudah digunakan di akun lain',

            ], 422);
        }
        if ($request->file('picture')) {
            if ($request->oldPicture) {
                Storage::delete($request->oldImage);
            }
            $picturePath = $request->file('picture')->store('user_pictures');
            $user->picture = $picturePath;
        }
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;
        $user->update();
        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil diperbarui',
            'data' => $user
        ], 200);
    }

    public function contact(){
        $userAdmin = User::where('is_admin','=',1)->select('name','picture','username','id','no_telp')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil diperbarui',
            'data' => $userAdmin
        ], 200);
    }
}
