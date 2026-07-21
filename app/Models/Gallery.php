<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    protected $fillable=[
        'photo', 'gallery_detail_id'
    ];

    public function gallery_detail() {
        return $this->belongsTo(GalleryDetail::class);
    }
}
