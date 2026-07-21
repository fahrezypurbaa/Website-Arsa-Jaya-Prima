<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
 
class LainnyaCertification extends Model
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
    public function getRouteKeyName()
    {
        return 'slugLainnya';
    }

    public function sluggable(): array
    {
        return [
            'slugLainnya' => [
                'source' => 'name'
            ]
        ];
    }
}
