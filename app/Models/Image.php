<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guard = [];

    protected $fillable=[
        'image', 'place_id'
    ];

    public function places() {
        return $this->belongsTo(Place::class);
    }
}
