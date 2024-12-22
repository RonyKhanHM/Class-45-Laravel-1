<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//Frontend url.....
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details', [FrontendController::class, 'productDetails']);
Route::get('/view-cart', [FrontendController::class, 'viewCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);

Auth::routes();

//Admin login url.....
Route::get('/admin/login', [AuthController::class, 'adminLogin'])->name('adminLogin');

// Admin Pannel....
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');

//Product Routs....
Route::get('/admin/create-product', [ProductController::class, 'create'])->name('product.creat');

//Caregory Routs....
Route::get('/admin/create-catetory', [CategoryController::class, 'create'])->name('category.creat');
Route::post('/admin/store-catetory', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/show-catetory', [CategoryController::class, 'show'])->name('category.show');
Route::get('/admin/delete-catetory/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/admin/edit-catetory/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/admin/update-catetory/{id}', [CategoryController::class, 'update'])->name('category.update');
