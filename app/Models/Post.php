<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // To prevent mass assignment entirely, set guarded to an empty array

    protected $fillable = ['title', 'exerpt', 'body', 'slug', 'category_id'];

    public function category()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }
}
