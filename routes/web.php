<?php

use Illuminate\Support\Facades\Route;
use App\models\Post;

use Spatie\YamlFrontMatter\YamlFrontMatter;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $doc = YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));
    ddd($doc->matter());
    // $posts = Post::all();
    // // ddd($posts[0]->getContents());
    // return view('posts', [
    //     'posts' => $posts
    // ]);
});
/*
        Route::get('posts/{post}', function ($slug) {



            if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {

                // dd('file doesnt exist'); //die dump 
                // ddd('file doesnt exist'); //dump die debug
                //ddd($path);
                // abort(404);
                return redirect('/');
            }
            $post = cache()->remember("posts.{$slug}", now()->addMinute(20), function () use ($path) {
                // now()->addHour(); or now()->addDay(); or in seconds ...
                //cache $path for 1hr
                //arrow function syntaxe :
                // $post = cache()->remember("posts.{$slug}", now()->addMinute(20) => file_get_contents($path));
                return file_get_contents($path);
            });


            //$post = file_get_contents($path);
            return view('post', [
                'post' =>  $post
            ]);
        })->where('post', '[A-z_\-]+'); //whereAlpha('post');
        */
Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
});
