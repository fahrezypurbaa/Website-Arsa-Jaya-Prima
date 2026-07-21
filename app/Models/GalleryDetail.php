<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryDetail extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    protected $fillable=[
        'id', 'gallery_category_id', 'name', 'training', 'schedule'
    ];
    
    protected $with = ['gallery_categories'];

    public function scopeFilter($query, array $filters) {

        $query->when($filters['gallery_categories'] ?? false, function($query, $gallery_categories) {
            return $query->whereHas('gallery_categories', function($query) use ($gallery_categories) {
                    $query->where('id', $gallery_categories);
                });
            });
    }

    public function gallery_categories() {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }

    protected $appends = ['first_image'];

    public function galleries() {
        return $this->hasMany(Gallery::class);
    }

    public function getFirstImageAttribute() {
        return $this->images;
    }
}
