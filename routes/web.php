<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');;

Route::post('/', [HomeController::class, 'store'])
    ->name('home.store');

Route::get('/{id}', [HomeController::class, 'show'])
    ->name('home.show');

Route::get('/home/create', [HomeController::class, 'create'])
    ->name('home.create');

Route::delete('/{id}', [HomeController::class, 'destroy'])
    ->name('home.destroy');

Route::get('/welcome/{name?}', function ($name=false) {
    if (!$name) {
        return "Hello, Unknown!";
    }
    return "Hello, ".$name;
});
