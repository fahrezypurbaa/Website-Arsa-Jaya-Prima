<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;
    protected $fillable = ['posisi','perusahaan_id','gaji','persyaratan','end_date','deskripsi'];
    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'perusahaan_id');
    }
}
