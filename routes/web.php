<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PostComment;

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
    return view('landing_page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard', [PostComment::class, 'store_comment'])
    ->name('wire.store_comment');

Route::post('/dashboard/edit', [HomeController::class, 'store_post'])
    ->name('home.store_post');

Route::get('/dashboard/posts', [HomeController::class, 'index'])
    ->name('home.index');;

Route::post('/dashboard/posts', [HomeController::class, 'store'])
    ->name('home.store');

Route::get('/dashboard/create', [HomeController::class, 'create'])
    ->name('home.create');

Route::get('/dashboard/posts/show_comment/{id}', [HomeController::class, 'show_comment'])
    ->name('home.show_comment');

Route::get('/dashboard/posts/{id}', [HomeController::class, 'show'])
    ->name('home.show');

Route::get('/dashboard/posts/edit/{id}', [HomeController::class, 'edit'])
    ->name('home.edit');

Route::get('/dashboard/profile/{id}', [HomeController::class, 'show_profile'])
    ->name('home.profile');

Route::delete('/dashboard/posts/{id}', [HomeController::class, 'destroy'])
    ->name('home.destroy');

Route::delete('/dashboard/posts/destroy_comment/{id}', [HomeController::class, 'destroy_comment'])
    ->name('home.destroy_comment');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
