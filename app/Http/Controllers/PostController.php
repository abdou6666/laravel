<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     public function index(){

        return view('posts.index',[
            // request(['search']) convert it to array
            'posts' => Post::latest()->filter(request(['search','category', 'author']))->paginate(2)->withQueryString()
  
        ]);
     }
     public function show(Post $post){
            return view('posts.show', [
        'post' => $post
             ]);
     }
       
}   
