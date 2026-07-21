<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $with=['training'];
    protected $fillable=['training_id','tanggal_mulai','tanggal_selesai','tempat','user_id', 'role'];
    public function training(){
        return $this->belongsTo(Training::class,'training_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function absensi(){
        return $this->hasMany(Absensi::class);
    }
}
