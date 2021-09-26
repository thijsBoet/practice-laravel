<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [HomeController::class, 'home'])
    ->name('home');
Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact');

Route::get('/single', AboutController::class);

Route::resource('posts', PostController::class)->only(['index', 'show']);

// Route::get('/posts', function () use($posts) {
//     // dd(request()->all());
//     dd((int)request()->input('page', 1));
//     return view('posts', ['posts' => $posts]);
// });

// Route::get('post/{id}', function ($id) use($posts){
//     return 'Blog post ' . $id;
// })->name('post');

Route::view('/about', 'about')->name('about');

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true,
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false,
        'has_comments' => false,
    ],
    3 => [
        'title' => 'Intro to Golang',
        'content' => 'This is a short intro to Golang',
        'is_new' => true,
        'has_comments' => false,
    ]
];

Route::prefix('/re')->name('res.')->group(function () use ($posts) {
    Route::get('/response', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Matthijs Boet', 3600);
    })->name('responses');

    Route::get('/redirect', function () {
        return redirect('/posts', ['id' => 1]);
    })->name('/redirect');

    Route::get('/back', function () {
        return back();
    })->name('back');

    Route::get('/named', function () {
        return redirect()->route('about', ['id' => 1]);
    });

    Route::get('/away', function () {
        return redirect()->away("http://yahoo.com");
    });

    Route::get('/json', function ()  use ($posts) {
        return response()->json($posts);
    });
});