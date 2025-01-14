<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//Frontend url.....
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{slug}', [FrontendController::class, 'productDetails']);
Route::get('/view-cart', [FrontendController::class, 'viewCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);
Route::get('/add-to-cart/{id}', [FrontendController::class, 'addToCart']);
Route::post('/add-to-cart/details/{id}', [FrontendController::class, 'addToCartDetails']);

Auth::routes();

//Admin login url.....
Route::get('/admin/login', [AuthController::class, 'adminLogin'])->name('adminLogin');

// Admin Pannel....
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');

//Product Routs....
Route::get('/admin/create-product', [ProductController::class, 'create'])->name('product.creat');
Route::post('/admin/store-product', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/show-product', [ProductController::class, 'show'])->name('product.show');
Route::get('/admin/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/admin/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/admin/update-product/{id}', [ProductController::class, 'update'])->name('product.update');

//Caregory Routs....
Route::get('/admin/create-catetory', [CategoryController::class, 'create'])->name('category.creat');
Route::post('/admin/store-catetory', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/show-catetory', [CategoryController::class, 'show'])->name('category.show');
Route::get('/admin/delete-catetory/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/admin/edit-catetory/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/admin/update-catetory/{id}', [CategoryController::class, 'update'])->name('category.update');

//SubCategory Routs....
Route::get('/admin/create-subcatetory', [SubCategoryController::class, 'create'])->name('subcategory.create');
Route::post('/admin/store-subcatetory', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/admin/show-subcatetory', [SubCategoryController::class, 'show'])->name('subcategory.show');
Route::get('/admin/delete-subcatetory/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
Route::get('/admin/edit-subcatetory/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('/admin/update-subcatetory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
