<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('product/all', [ProductController::class, 'all']);
Route::get('location/all', [LocationController::class, 'all']);
Route::get('product/code/{product:code}', [ProductController::class, 'code']);
Route::get('location/{location}/products', [LocationController::class, 'products']);

Route::resource('location', LocationController::class)->except(["create", "edit"]);
Route::resource('product', ProductController::class)->except(["create", "edit"]);
