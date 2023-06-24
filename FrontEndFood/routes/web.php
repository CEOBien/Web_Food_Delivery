<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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




Route::get('/', 'HomeController@index' )->name('home');
// Route::get('/checkUser', 'HomeController@loginUser' );
Route::get('/login', 'LoginController@index' )->name('index');
Route::get('/checkuser', 'LoginController@loginUser' );
Route::get('/logout', 'LoginController@logout' )->name('logout');
//login
Route::post('/login/login', 'LoginController@login' )->name('login');
//register
Route::post('/login/register', 'LoginController@register' )->name('register');
//category
Route::get('/category/{slug}/{id}', 'CategoryController@index')->name('category.product');
//show product for user add to cart
Route::get('/products', 'ProductController@index' );
//add to cart 
Route::get('/products/add-to-cart/{id}', 'ProductController@addToCart' )->name('addToCart');
//show cart
Route::get('/products/show-cart', 'ProductController@showCart' )->name('showCart');
//update cart
Route::get('/products/update-cart', 'ProductController@updateCart' )->name('updateCart');
//delete Cart
Route::get('/products/delete-cart', 'ProductController@deleteCart' )->name('deleteCart');
//search product
Route::get('/products/search', 'ProductController@search' )->name('searchProduct');

//product detailt
Route::get('/products/product-detail/{id}', 'ProductController@productDetail' )->name('productDetail');

//blog
Route::get('/blog', 'BlogController@index' )->name('blog');
//blog detail
Route::get('/blog/blog-detail/{id}', 'BlogController@show' )->name('blogDetail');
//comment
Route::post('comment/{id}', 'BlogController@comment')->name('comment');

Route::get('/checkout', 'AdminBillsController@index' )->name('checkout');
Route::post('/checkout/bill', 'AdminBillsController@store' )->name('store');
route::get('/404','AdminBillsController@error')->name('error');
Route::get('/contact','ContactController@show')->name('contact');
Route::post('/contact','ContactController@send')->name('send');

Route::post('/login/check', 'LoginController@checkEmail')->name('login.checkEmail');
