<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('restaurant', RestaurantController::class);
Route::apiResource('compte', CompteController::class);
Route::apiResource('categorie', CategorieController::class);
Route::apiResource('type', TypeController::class);
Route::apiResource('table', TableController::class);
Route::apiResource('menu', MenuController::class);
