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
Route::get('/','PagesController@index')->
name('index');
Route::get('/search','PagesController@search')->
name('search');
Route::get('/products','PagesController@products')->name('products');

Route::get('/products/{slug}','ProductController@show')->name('products.show');

// Admin
Route::get('/admin','AdminPagesController@index')->name('admin.index');
Route::get('/admin/products','AdminPagesController@manage_products')->name('admin.product.create');
Route::get('/admin/product/create','AdminPagesController@product_create')->name('admin.products');
Route::get('/admin/product/edit/{id}','AdminPagesController@product_edit')->name('admin.product.edit');
Route::post('/admin/product/create','AdminPagesController@product_store')->name('admin.product.store');
Route::post('/admin/product/edit/{id}','AdminPagesController@product_update')->name('admin.product.update');
Route::get('/admin/product/delete/{id}','AdminPagesController@product_delete')->name('admin.product.delete');

// category
Route::get('/category/index','CategoryController@index')->name('admin.categories');
Route::get('/category/create','CategoryController@create')->name('admin.category.create');
Route::get('/category/edit/{id}','CategoryController@edit')->name('admin.category.edit');
Route::post('/category/store','CategoryController@store')->name('admin.category.store');
Route::post('/category/edit/{id}','CategoryController@update')->name('admin.category.update');
Route::get('/category/delete/{id}','CategoryController@delete')->name('admin.category.delete');

// brand
Route::get('/brand','BrandController@index')->name('admin.brands');
Route::get('/brand/create','BrandController@create')->name('admin.brand.create');
Route::get('/brand/edit/{id}','BrandController@edit')->name('admin.brand.edit');
Route::post('/brand/store','BrandController@store')->name('admin.brand.store');
Route::post('/brand/edit/{id}','BrandController@update')->name('admin.brand.update');
Route::get('/brand/delete/{id}','BrandController@delete')->name('admin.brand.delete');


// division
Route::get('/division','DivisionController@index')->name('admin.divisions');
Route::get('/division/create','DivisionController@create')->name('admin.division.create');
Route::get('/division/edit/{id}','DivisionController@edit')->name('admin.division.edit');
Route::post('/division/store','DivisionController@store')->name('admin.division.store');
Route::post('/division/edit/{id}','DivisionController@update')->name('admin.division.update');
Route::get('/division/delete/{id}','DivisionController@delete')->name('admin.division.delete');


// district
Route::get('/district','DistrictController@index')->name('admin.districts');
Route::get('/district/create','DistrictController@create')->name('admin.district.create');
Route::get('/district/edit/{id}','DistrictController@edit')->name('admin.district.edit');
Route::post('/district/store','DistrictController@store')->name('admin.district.store');
Route::post('/district/edit/{id}','DistrictController@update')->name('admin.district.update');
Route::get('/district/delete/{id}','DistrictController@delete')->name('admin.district.delete');

//user
Route::get('/token/{token}','VerificationController@verify')->name('user.verification');
Route::get('/dashboard','UsersController@dashboard')->name('user.dashboard');
Route::get('/profile','UsersController@profile')->name('user.profile');
Route::post('/profile/update','UsersController@profileUpdate')->name('user.profile.update');

//cart
Route::get('/carts','CartsController@index')->name('carts');
Route::post('/carts/store','CartsController@store')->name('carts.store');
Route::post('/carts/update/{id}','CartsController@update')->name('carts.update');
Route::post('/carts/delete/{id}','CartsController@destroy')->name('carts.delete');

//checkout
Route::get('/checkout','CheckoutsController@index')->name('checkouts');
Route::post('/checkout/store','CheckoutsController@store')->name('checkouts.store');


Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
