<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function searchableAs()
    {
        return 'books_index';
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
