<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakPembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['nama_kontak','jabatan_kontak','no_telp','metode'];

    public function perusahaan()
    {
        return $this->hasMany(Perusahaan::class);
    }

}
