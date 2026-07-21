<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['kategori'];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query ->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, function($query, $training_categories) {
            return $query->whereHas('kategori', function($query) use ($training_categories) {
                    $query->where('slug', $training_categories);
                });
            });
    }
    
    public function event() {
        return $this->hasMany(Event::class);
    }

    public function kemnakerCertification() {
        return $this->hasMany(KemnakerCertification::class);
    }

    public function bnspCertification() {
        return $this->hasMany(BnspCertification::class);
    }

    public function softskill() {
        return $this->hasMany(Softskill::class);
    }

    public function kategori() {
        return $this->belongsTo(TrainingCategories::class, 'training_categories_id');
    }  
    
    public function inhouse() {
        return $this->hasMany(InhouseRegistrant::class);
    }

    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function pelatihan(){
        return $this->hasMany(Pelatihan::class);
    }
    // route model binding 
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
