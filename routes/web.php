<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//Frontend url.....
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{slug}', [FrontendController::class, 'productDetails']);
Route::get('/view-cart', [FrontendController::class, 'viewCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);
Route::get('/add-to-cart/{id}', [FrontendController::class, 'addToCart']);
Route::get('/add-to-cart/delete/{id}', [FrontendController::class, 'addToCartDelete']);
Route::post('/add-to-cart/details/{id}', [FrontendController::class, 'addToCartDetails']);
Route::post('/confirm-order', [FrontendController::class, 'confirmOrder']);
Route::get('/order-confirm/{invoiceId}', [FrontendController::class, 'thankYouPage']);
Route::get('/shop-products', [FrontendController::class, 'shopProducts']);
Route::get('/offer-products', [FrontendController::class, 'offerProducts']);
Route::get('/combo-products', [FrontendController::class, 'comboProducts']);
Route::get('/standard-products', [FrontendController::class, 'standardProducts']);
Route::get('/premium-products', [FrontendController::class, 'premiumProducts']);
Route::get('/search-products', [FrontendController::class, 'searchProducts']);
//Policies pages...................
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions']);
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy']);
Route::get('/payment-policy', [FrontendController::class, 'peymentPolicy']);
Route::get('/about-us', [FrontendController::class, 'aboutUs']);

//Category Products......
Route::get('category-products/{slug}/{id}', [FrontendController::class, 'categoryProducts']);
Route::get('subcategory-products/{slug}/{id}', [FrontendController::class, 'subCategoryProducts']);
Route::get('type-products/{type}', [FrontendController::class, 'typeProducts']);

//Return process-abourt us-Contact us................................
Route::get('/return-product', [FrontendController::class, 'showReturnForm']);
Route::post('/return-product-request/store', [FrontendController::class, 'storeReturnRequest']);
Route::get('/contact-us', [FrontendController::class, 'showContactForm']);
Route::post('/contact-form/store', [FrontendController::class, 'storeContactForm']);

Auth::routes();

//Admin login url.....
Route::get('/admin/login', [AuthController::class, 'adminLogin'])->name('adminLogin');
Route::get('/admin/logout', [AuthController::class, 'adminLogout'])->name('adminLogout');

// Admin Pannel....
Route::middleware(['role:admin,editor,accounts,employee'])->group(function(){
  Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');
});

//Reviews Routs.........................
Route::middleware(['role:admin,editor'])->group(function(){
  Route::get('/admin/create-review', [ProductController::class, 'createReview'])->name('review.creat');
  Route::post('/admin/store-review', [ProductController::class, 'storeReview'])->name('review.store');
  Route::get('/admin/show-reviews', [ProductController::class, 'showReview'])->name('review.show');
  Route::get('/admin/delete-review/{id}', [ProductController::class, 'deleteReview'])->name('review.delete');
  Route::get('/admin/edit-review/{id}', [ProductController::class, 'editReview'])->name('review.edit');
  Route::post('/admin/update-review/{id}', [ProductController::class, 'updateReview'])->name('review.update');


  //Product Routs................
  Route::get('/admin/create-product', [ProductController::class, 'create'])->name('product.creat');
  Route::post('/admin/store-product', [ProductController::class, 'store'])->name('product.store');
  Route::get('/admin/show-product', [ProductController::class, 'show'])->name('product.show');
  Route::get('/admin/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');
  Route::get('/admin/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
  Route::post('/admin/update-product/{id}', [ProductController::class, 'update'])->name('product.update');

  //Sliders banners...........................
  Route::get('/admin/show-sliders', [BannerController::class, 'showSliders'])->name('slider.show');
  Route::get('/admin/create-sliders', [BannerController::class, 'createSliders'])->name('slider.create');
  Route::post('/admin/store-sliders', [BannerController::class, 'storeSliders'])->name('slider.store');
  Route::get('/admin/edit-sliders/{id}', [BannerController::class, 'editSliders'])->name('slider.edit');
  Route::post('/admin/update-sliders/{id}', [BannerController::class, 'updateSliders'])->name('slider.update');
  Route::get('/admin/delete-sliders/{id}', [BannerController::class, 'deleteSliders'])->name('slider.delete');

  //Banners...........................
  Route::get('/admin/show-banners', [BannerController::class, 'showBanners'])->name('banner.show');
  Route::get('/admin/create-banners', [BannerController::class, 'createBanners'])->name('banner.create');
  Route::post('/admin/store-banners', [BannerController::class, 'storeBanners'])->name('banner.store');
  Route::get('/admin/edit-banners/{id}', [BannerController::class, 'editBanners'])->name('banner.edit');
  Route::post('/admin/update-banners/{id}', [BannerController::class, 'updateBanners'])->name('banner.update');
  Route::get('/admin/delete-banners/{id}', [BannerController::class, 'deleteBanners'])->name('banner.delete');

});

//Caregory Routs....
Route::middleware(['role:admin'])->group(function(){
  Route::get('/admin/create-catetory', [CategoryController::class, 'create'])->name('category.creat');
  Route::post('/admin/store-catetory', [CategoryController::class, 'store'])->name('category.store');
  Route::get('/admin/show-catetory', [CategoryController::class, 'show'])->name('category.show');
  Route::get('/admin/delete-catetory/{id}', [CategoryController::class, 'delete'])->name('category.delete');
  Route::get('/admin/edit-catetory/{id}', [CategoryController::class, 'edit'])->name('category.edit');
  Route::post('/admin/update-catetory/{id}', [CategoryController::class, 'update'])->name('category.update');
});

//Vendor Added Routs...........................
Route::middleware(['role:admin'])->group(function(){
  Route::get('/admin/added-vendor', [VendorController::class, 'addedVendor'])->name('vendor.added');
  Route::post('/admin/store-vendor', [VendorController::class, 'storeVendor'])->name('vendor.store');
  Route::get('/admin/show-vendor', [VendorController::class, 'showVendor'])->name('vendor.show');
  Route::get('/admin/delete-vendor/{id}', [VendorController::class, 'deleteVendor'])->name('vendor.delete');
  Route::get('/admin/edit-vendor/{id}', [VendorController::class, 'editVendor'])->name('vendor.edit');
  Route::post('/admin/update-vendor/{id}', [VendorController::class, 'updateVendor'])->name('vendor.update');

  //SubCategory Routs.........................
  Route::get('/admin/create-subcatetory', [SubCategoryController::class, 'create'])->name('subcategory.create');
  Route::post('/admin/store-subcatetory', [SubCategoryController::class, 'store'])->name('subcategory.store');
  Route::get('/admin/show-subcatetory', [SubCategoryController::class, 'show'])->name('subcategory.show');
  Route::get('/admin/delete-subcatetory/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
  Route::get('/admin/edit-subcatetory/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
  Route::post('/admin/update-subcatetory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
});


//Site Settings and policies....................
Route::middleware(['role:admin,editor'])->group(function(){
  Route::get('/admin/site-settings', [SiteSettingController::class, 'showSettings']);
  Route::post('/admin/site-settings/update', [SiteSettingController::class, 'updateSettings']);

  Route::get('/admin/show/privacy-policy', [SiteSettingController::class, 'showPrivacyPolicy']);
  Route::post('/admin/update/privacy-policy', [SiteSettingController::class, 'updatePrivacyPolicy']);

  Route::get('/admin/show/terms-conditions', [SiteSettingController::class, 'showTermsConditions']);
  Route::post('/admin/update/terms-conditions', [SiteSettingController::class, 'updateTermsConditions']);

  Route::get('/admin/show/refund-policy', [SiteSettingController::class, 'showRefundPolicy']);
  Route::post('/admin/update/refund-policy', [SiteSettingController::class, 'updateRefundPolicy']);

  Route::get('/admin/show/payment-policy', [SiteSettingController::class, 'showPaymentPolicy']);
  Route::post('/admin/update/payment-policy', [SiteSettingController::class, 'updatePaymentPolicy']);

  Route::get('/admin/show/about-us', [SiteSettingController::class, 'showAboutUs']);
  Route::post('/admin/update/about-us', [SiteSettingController::class, 'updateAboutUs']);
});

//Orders Routes........................
Route::middleware(['role:admin,editor,employee'])->group(function(){
  Route::get('/admin/all-orders', [OrderController::class, 'showAllOrders']);
  Route::get('/admin/order/status/{order_id}/{status_type}', [OrderController::class, 'updateStatus']);
  Route::get('/admin/status-orders/{status_type}', [OrderController::class, 'statusWiseOrder']);
  Route::get('/admin/order/edit/{id}', [OrderController::class, 'editOrder']);
  Route::post('/admin/order/update/{id}', [OrderController::class, 'updateOrder']);
});

//credentials..........................
Route::middleware(['role:admin,editor,accounts,employee'])->group(function(){
  Route::get('/admin/show-credentials', [AuthController::class, 'showCredentials']);
  Route::post('/admin/update-credentials', [AuthController::class, 'updateCredentials']);
});

//Employees.............................
Route::middleware(['role:admin'])->group(function(){
  Route::get('/admin/show-employees', [RoleController::class, 'showEmployees']);
  Route::get('/admin/create-employees', [RoleController::class, 'createEmployees']);
  Route::post('/admin/store-employees', [RoleController::class, 'storeEmployees']);
  Route::get('/admin/edit-employees/{id}', [RoleController::class, 'editeEmployees']);
  Route::post('/admin/update-employees/{id}', [RoleController::class, 'updateEmployees']);
});

//Messages........................
Route::middleware(['role:admin,editor'])->group(function(){
  Route::get('/admin/show-contact-messages', [MessageController::class, 'showContactMessages']);
  Route::get('/admin/delete-contact-message/{id}', [MessageController::class, 'deleteContactMessages']);
  Route::get('/admin/show-return-req-messages', [MessageController::class, 'showRetunrReqMessages']);
  Route::get('/admin/delete-return-req-message/{id}', [MessageController::class, 'deleteRetunrReqMessages']);
});