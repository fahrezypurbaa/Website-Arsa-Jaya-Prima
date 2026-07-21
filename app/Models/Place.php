<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;
    use Sluggable;
    // protected $guarded = [];
    protected $fillable= [
        'name', 'slug', 'city', 'desc', 'training_list', 'address', 'link'
    ];
    protected $appends = ['first_image'];

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function getFirstImageAttribute() {
        return $this->images->first();
    }

    // route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
