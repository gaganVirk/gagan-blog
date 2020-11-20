<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'upload_image'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
