<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemnakerCertification extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id']; 

    public function staff() {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function training() {
        return $this->belongsTo(Training::class, 'training_id');
    }  
    // route model binding
    public function getRouteKeyName() {
        return 'slugKemnaker';
    }

    public function sluggable(): array {
        return [
            'slugKemnaker' => [
                'source' => 'name'
            ]
        ];
    }
}
