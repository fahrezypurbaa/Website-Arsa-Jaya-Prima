<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id']; 
    protected $with = ['training'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function training(){
        return $this->belongsTo(Training::class,  'training_id');
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
