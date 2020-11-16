<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'category_id',
        'title',
        'body',
    ];

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
