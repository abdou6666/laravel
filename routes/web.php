<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\registerController;
use App\http\Controllers\SessionController;
use App\http\Controllers\PostCommentsController;
use App\Services\newslettre;


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

Route::post('newslettre', function () {

    request()->validate([
        'email' => 'required|email'
    ]);


    try {
        $newslettre = new newslettre();
        $newslettre->subscribe(request('email'));
    } catch (\Exception $e) {
        return redirect('/')->with('success', 'Something went wrong ! Try again.');
    }

    return redirect('/')->with('success', 'You are now signed up for our newslettre !');
});


Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
// Route::get('register', [registerController::class, 'create']);
// Route::post('register', [registerController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');
