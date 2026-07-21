<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_perusahaan','alamat_perusahaan','koordinator_id','kontak_pembayaran_id'];
    public function kontak_pembayaran(){
        return $this->belongsTo(KontakPembayaran::class,'kontak_pembayaran_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'koordinator_id');
    }
    public function loker(){
        return $this->hasMany(Loker::class);
    }
}
