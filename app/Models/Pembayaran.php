<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = ['pelatihan_id','jumlah_pelatihan','bukti_pembayaran','status'];
    public function pelatihan(){
        return $this->belongsTo(Pelatihan::class,'pelatihan_id');
    }
}
