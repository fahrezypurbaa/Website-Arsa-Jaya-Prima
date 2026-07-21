<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Mail\sendmail;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Password;

class DashboardStaffController extends Controller
{
    public function index() {
        $user = User::where('is_admin', '=', '0')->get();
        return view('dashboard.staff.index', [
            'title' => 'Daftar Staff',
        ], compact('user'));
    }

    public function create()
    {
        $status = ['1','0'];
        return view('dashboard.staff.create', [
            'title' => "Tambah Staff",
        ], compact('status'));
    }

    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'name'  => 'required|max:255',
            'username'  => ['required', 'min:3', 'max:255', 'unique:users'],
            'picture' => 'image|file|max:1024',
            'email' => ['required','email:dns','unique:users'],
            'password'  => 'required|min:8|max:255',
            'status' => 'required'
        ]);

        if($request->file('picture')) {
            $validatedData['picture'] = $request->file('picture')->store('user->picture');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        event(new Registered($user));

        return redirect()->route('verification.notice')->with('success', 'Akun berhasil dibuat, silahkan verifikasi Email Anda');
    }

    public function edit($id)
    {
        $status = ['1','0'];
        $user = User::find($id);
        return view('dashboard.staff.edit', [
            'title' => "Edit Staff",
        ], compact('status', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = $request->input('status');
        $user->update();

        return redirect('/dashboard/staff')->with('success', 'Staff berhasil diperbaharui!');
        // $validatedData = $request->validate([
    }

    public function resetPassword(Request $request, $id) {
        $user = User::find($id);
        return view('dashboard.staff.reset', [
            'title' => "Reset Password Staff",
        ], compact('user'));
    }

    public function showForgotForm()
    {
        return view('/dashboard/staff/forgot', [
            'title' => "Reset Password",
        ]);
    }

    public function resend($id)
    {
        $user = User::find($id);
        return view('dashboard.staff.resend', [
            'title' => 'Resend Email Verification'
        ], compact('user'));
    }

    public function showForgetPasswordForm() {
        return view('dashboard.staff.forget-password', [
            'title' => 'Reset Password'
        ]);
    }

    public function submitForgetPasswordForm(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);
    
            $token = Str::random(64);
    
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
    
            ]);
            
            $reset = DB::table('password_reset_tokens')->where('token', $token)->first();
            $sendto = $reset->email;

            Mail::to($sendto)->send(new sendmail($token)); //
    
            // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            //     $message->to($request->email);
            //     $message->subject('Reset Password Account');
            // });
    
            return back()->with('success', 'Link reset password sudah dikirimkan ke email tersebut!');    
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()->with('success', 'Sebelumnya kami sudah mengirimkan email reset password, harap cek inbox email terlebih dahulu!');
            }
        }
        // $request->validate([
        //     'email' => 'required|email|exists:users',
        // ]);

        // $token = Str::random(64);

        // DB::table('password_reset_tokens')->insert([
        //     'email' => $request->email, 
        //     'token' => $token, 
        //     'created_at' => Carbon::now()

        //   ]);

        // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });

        // return back()->with('success', 'Link reset password sudah dikirimkan ke email tersebut!');
    }
}
