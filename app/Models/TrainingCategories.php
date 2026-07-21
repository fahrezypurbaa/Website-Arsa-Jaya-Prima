<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingCategories extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    

    public function trainings() {
        return $this->hasMany(Training::class);
    }

    public function kategoriSertifikasi() {
        return $this->hasMany(KategoriSertifikasi::class);
    }

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
