<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Navigation*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/blog', function () {
    return view('blog');
});

// Aticles
Route::get('/article', function () {
    return view('article');
});

Route::get('/article/{n}', function ($n) {
    return view('article')->with('numero', $n);
})->where('n', '[0-9]+');

// Articles = posts => routes "posts.*"
Route::resource("posts", PostController::class);
// Route::get('/', [PostController::class, "index"]);
// ->only(['index', 'store', 'edit', 'update', 'destroy'])
// ->middleware(['auth', 'verified']);

// Commentaires = comments => routes "comments.*"
Route::resource('comments', CommentController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Authentification*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
