<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'image',
        'generate_name',
        'path'

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
