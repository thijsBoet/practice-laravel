<?php

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

Route::view('/', 'home')->name('home');

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

Route::get('/posts', function () use($posts) {
    return view('posts', ['posts' => $posts]);
});

Route::get('post/{id}', function ($id) use($posts){
    return 'Blog post ' . $id;
})->name('post');

Route::view('/about', 'about')->name('about');

Route::view('/contact', 'contact')->name('contact');

Route::prefix('/re')->name('res.')->group(function() use($posts) {
    Route::get('/response', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Matthijs Boet', 3600);
    })->name('responses');

    Route::get('/redirect', function() {
        return redirect('/');
    })->name('/redirect');

    Route::get('/back', function () {
        return back();
    })->name('back');
});