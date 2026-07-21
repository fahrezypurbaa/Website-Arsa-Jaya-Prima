<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $guard = ['id'];

    protected $fillable=[
        'berkas_file','filename', 'user_id', 'pelatihan'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
