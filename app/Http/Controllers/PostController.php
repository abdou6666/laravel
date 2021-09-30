<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     public function index(){

        return view('posts',[
            // request(['search']) convert it to array
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
     }
     public function show(Post $post){
            return view('post', [
        'post' => $post
             ]);
     }
       
}   
