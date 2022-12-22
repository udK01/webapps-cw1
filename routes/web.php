<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/posts', [HomeController::class, 'index'])
    ->name('home.index');;

Route::post('/dashboard/posts', [HomeController::class, 'store'])
    ->name('home.store');

Route::post('/dashboard/posts', [HomeController::class, 'store_comment'])
    ->name('home.store_comment');

Route::get('/dashboard/create', [HomeController::class, 'create'])
    ->name('home.create');

Route::get('/dashboard/{id}', [HomeController::class, 'show'])
    ->name('home.show');

Route::delete('/dashboard/{id}', [HomeController::class, 'destroy'])
    ->name('home.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
