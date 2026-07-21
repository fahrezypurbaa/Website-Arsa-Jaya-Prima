<?php

namespace App\Models;
use App\Mail\SendAccountMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOTPMail;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'username', 'picture', 'email', 'password', 'status', 'email_verified_at','alamat','no_telp','jabatan','berkas','perusahaan_id','role','password_otomatis','google_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function kemnaker()
    {
        return $this->hasMany(KemnakerCertification::class);
    }

    public function bnsp()
    {
        return $this->hasMany(BnspCertification::class);
    }

    public function perusahaan()
    {
        return $this->hasMany(Perusahaan::class);
    }

    public function inhouse()
    {
        return $this->hasMany(InhouseRegistrant::class);
    }

    // route model binding
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function generateCode(){
        $code = rand(1000000, 999);
        UserCode::updateOrCreate(
            ['user_id' =>auth()->guard('api')->user()->id],
            ['code' => $code]
        );
        try{
            $details = [
                'code' => $code,
                'user' => auth()->guard('api')->user()->username
            ];
            // kirim kode OTP dan user ke pesan email
            Mail::to(auth()->guard('api')->user()->email)->send(new SendOTPMail($details));
        }catch(\Exception $e){
            info("Error: ". $e->getMessage());
            dd($e);
        }
    }

    public function getAccount($email){
        try{
            $user =  User::where('email','=',$email)->first();
            $details = [
                'user' => $user
            ];
            // kirim kode OTP dan user ke pesan email
            Mail::to($user->email)->send(new SendAccountMail($details));
        }catch(\Exception $e){
            info("Error: ". $e->getMessage());
            dd($e);
        }
    }

    public function pelatihan(){
        return $this->hasMany(Pelatihan::class);
    }
    
    public function berkas(){
        return $this->hasMany(Berkas::class);
    }

    
}
