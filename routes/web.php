<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details', [FrontendController::class, 'productDetails']);
Route::get('/view-cart', [FrontendController::class, 'viewCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);