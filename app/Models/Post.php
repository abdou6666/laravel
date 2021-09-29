<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $with = ['category', 'author']; //when fetching data it'll look for category & author aswell (jointure) & clean up route load/with

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        //hasOne , hasMany, belongTo , belongsToMany
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
