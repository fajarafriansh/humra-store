<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

// Homepage Route
Route::get('/', 'IndexController@index');

// Category/Listing Page Routes
Route::get('/products/{url}', 'ProductsController@products');

// Product Detail Routes
Route::get('/product/hs-{id}', 'ProductsController@productDetail');

// get Product Price
Route::get('/get-product-price', 'ProductsController@getProductPrice');

// Add to cart routes
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtoCart');

// Cart Page routes
Route::match(['get', 'post'], '/cart', 'ProductsController@cart');

// Delete product from cart
Route::get('/cart/delete-product/hs-{id}', 'ProductsController@deleteCartProduct');

// Update cart route
Route::get('/cart/update-cart/{id}/{quantity}', 'ProductsController@updateCart');

// Coupon
Route::post('/cart/apply-coupon', 'ProductsController@applyCoupon');

// User Routes
Route::match(['get', 'post'], '/user/register', 'UsersController@register');
Route::match(['get', 'post'], '/user/check-email', 'UsersController@checkEmail');
Route::match(['get', 'post'], '/user/login', 'UsersController@login');
Route::get('/user/logout', 'UsersController@logout');

// User Routes after login
Route::group(['middleware' => ['frontlogin']], function() {
	Route::match(['get', 'post'], '/user/profile', 'UsersController@account');
	Route::post('/user/check-password', 'UsersController@checkPassword');
	Route::post('/user/update-password', 'UsersController@updatePassword');
	Route::match(['get', 'post'], '/checkout', 'ProductsController@checkout');
	Route::match(['get', 'post'], '/order-review', 'ProductsController@orderReview');
	Route::match(['get', 'post'], '/place-order', 'ProductsController@placeOrder');
	Route::get('/confirmation', 'ProductsController@confirmation');
	Route::get('/orders', 'ProductsController@userOrders');
	Route::get('/orders/{id}', 'ProductsController@userOrderDetails');
});

// Admin Routes
Route::match(['get', 'post'], '/admin/login', 'AdminController@login');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
	Route::get('/admin', 'AdminController@admin');
	Route::get('/admin/dashboard', 'AdminController@dashboard');
	Route::get('/admin/profile', 'AdminController@profile');

	Route::get('/admin/settings', 'AdminController@settings');
	Route::get('/admin/settings/security', 'AdminController@securitySettings');
	Route::get('/admin/check-pass', 'AdminController@checkPass');
	Route::match(['get', 'post'], '/admin/update-pass', 'AdminController@updatePass');

	// Category Routes
	Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
	Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
	Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
	Route::get('/admin/categories', 'CategoryController@viewCategories');

	// Product Routes
	Route::match(['get', 'post'], '/admin/add-product', 'ProductsController@addProduct');
	Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductsController@editProducts');
	Route::get('/admin/delete-product/{id}', 'ProductsController@deleteProducts');
	Route::get('/admin/delete-product-image/{id}', 'ProductsController@deleteProductsImage');
	Route::get('/admin/products', 'ProductsController@viewProducts');

	// Products Attribute & Alt Image Routes
	Route::match(['get', 'post'], '/admin/add-attributes/{id}', 'ProductsController@addAttributes');
	Route::match(['get', 'post'], '/admin/edit-attributes/{id}', 'ProductsController@editAttributes');
	Route::match(['get', 'post'], '/admin/add-images/{id}', 'ProductsController@addImages');
	Route::get('/admin/delete-attributes/{id}', 'ProductsController@deleteAttributes');
	Route::get('/admin/delete-alt-image/{id}', 'ProductsController@deleteAltImage');

	// Coupon Routes
	Route::match(['get', 'post'], '/admin/add-coupon', 'CouponController@addCoupon');
	Route::match(['get', 'post'], '/admin/edit-coupon/{id}', 'CouponController@editCoupon');
	Route::get('/admin/delete-coupon/{id}', 'CouponController@deleteCoupon');
	Route::get('/admin/coupons', 'CouponController@viewCoupons');

	// Banner Routes
	Route::match(['get', 'post'], '/admin/add-banner', 'BannerController@addBanner');
	Route::match(['get', 'post'], '/admin/edit-banner/{id}', 'BannerController@editBanner');
	Route::get('/admin/delete-banner/{id}', 'BannerController@deleteBanner');
	Route::get('/admin/delete-banner-image/{id}', 'BannerController@deleteBannersImage');
	Route::get('/admin/banners', 'BannerController@viewBanners');
});

Route::get('/logout', 'AdminController@logout');
