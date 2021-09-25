<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
    public static function find($slug)
    {

        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {

            // dd('file doesnt exist'); //die dump 
            // ddd('file doesnt exist'); //dump die debug
            //ddd($path);
            // abort(404);
            throw new ModelNotFoundException();
        }
        return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
        // now()->addHour(); or now()->addDay(); or in seconds ...
        //cache $path for 1hr
        //arrow function syntaxe :
        // $post = cache()->remember("posts.{$slug}", now()->addMinute(20) => file_get_contents($path));

    }
}
