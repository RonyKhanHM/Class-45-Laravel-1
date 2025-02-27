<?php

use App\Http\Controllers\Appsapi\CategoryController;
use App\Http\Controllers\Appsapi\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Categories......................................
Route::get('/get-categories', [CategoryController::class, 'getCategories']);
Route::get('/get-products', [ProductController::class, 'getProducts']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
