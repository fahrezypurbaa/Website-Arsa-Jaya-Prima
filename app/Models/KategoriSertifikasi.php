<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSertifikasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kategori'];

    protected $fillable = [
        'nama_kategori','img_kategori','training_categories_id'
    ];
  
    public function kategori() {
        return $this->belongsTo(TrainingCategories::class, 'training_categories_id');
    }  
}
