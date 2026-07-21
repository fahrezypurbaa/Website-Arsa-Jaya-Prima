<?php

namespace App\Models;

use App\Models\User;
use Conner\Tagging\Model\Tag;
use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    // use HasTags;
    use \Conner\Tagging\Taggable;

    protected $guarded = ['id']; 
    protected $with = ['kategori', 'author'];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query ->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
        });
        
        // == callback function version ==
        $query->when($filters['kategori'] ?? false, function($query, $category) {
        return $query->whereHas('kategori', function($query) use ($category) {
                    $query->where('slug', $category);
                });
            });
        // == callback function version ==
        $query->when($filters['tags'] ?? false, function($query, $tags) {
            return $query->withAnyTag(['slug', $tags]);
        });
        // == arrow function version ==
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
        )
        );
    }

    // == 1 Post belongs to 1 Category == //
    public function kategori() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id'); 
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
                'source' => 'title'
            ]
        ];
    }
}
