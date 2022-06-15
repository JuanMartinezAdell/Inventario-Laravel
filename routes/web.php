<?php

use App\Http\Controllers\Dashboard\LocationController;
use App\Http\Controllers\Dashboard\ProductController;
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

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name("dashboard");

    Route::resource('product', ProductController::class);

    Route::resource('location', LocationController::class);
});



require __DIR__ . '/auth.php';
