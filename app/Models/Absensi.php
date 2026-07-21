<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = ['pelatihan_id','foto_absensi', 'is_confirmed'];

    public function pelatihan(){
        return $this->belongsTo(Pelatihan::class, 'pelatihan_id');
    }
}
