<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class GalleryCategory extends Model
{
    use HasFactory;
    use Sluggable;

    public $incrementing = false;

    protected $guarded = ['id'];

    protected $fillable= [
        'name', 'slug'
    ];

    public function gallery_detail()
    {
        return $this->hasMany(GalleryDetail::class);
    }

    public function photos() : HasManyThrough
    {
        return $this->hasManyThrough(
            Gallery::class,
            GalleryDetail::class,
            'gallery_category_id',
            'gallery_detail_id');
    }

    // route model binding
    public function getRouteKeyName()
    {
        return 'id';
    }

    public function sluggable(): array
    {
        return [
            'id' => [
                'source' => 'name'
            ]
        ];
    }
}
