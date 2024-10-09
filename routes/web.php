<?php

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;


// اقدر احمل بكجات الي الي ابي مثل للكومنتات علي البوست فيه بكج ف ابحث واحمله 
// وايضا حملت بكج لديبق وجدا مفيد



Route::get('/', function () {
    return view('welcome');
});

// this function sholud be in controller
/* Route::get('/test', function () {
 
    $aa = 'afnan';
    return view('test',['name'=> $aa,'age'=> '23']);
}); */

Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
 Route::get('/posts', [PostController::class,'index'])->name('posts.index');
 Route::post('/posts', [PostController::class,'store'])->name('posts.store');

 Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show'); // here it means that any thing u write after posts/ will call function show 
// like localhost/posts/1
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');


//Route::get('/posts/{post}/test/{any}', [PostController::class,'secondAction']); 
 /* Route::get('/test2', [TestController::class,'secondAction']); */
// or i can use the path instead of TestController::class 
// the path is App\Http\Controllers\TestController

//echo TestController::class .''; //here it prints the path

// first step into blog poject is define routes for user to access it through browser
// second step is controllers
// 3 - define view that contain list of posts
//4- remove any static html data from the view ??

//rename every controller and route to follow the same table in (action handeled by resource controllers) in laravel website
// also rename so class start with capital at each word while methods start with small and the rest of words are capital
// for the views it well known to name it like the action name {function inside controller class}