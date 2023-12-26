<?php

use Illuminate\Support\Facades\Route;

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

/**
 * For check roles (permission access) for each route (function_code),
 * required each route have to a name which used to the
 * check in middleware permission and this is defined in Module, Function Management
 * @author: ThangNH
 * @created_at: 2021/10/01
 */

Route::namespace('FrontEnd')->group(function () {
  Route::get('/convert', 'CmsController@convert');
  Route::get('/saveuser', 'OrderController@saveuser');
  Route::post('/vnpay_payment', 'OrderController@vnpayPayment');
  Route::get('/countdownload', 'CmsController@countdownload');
  Route::get('/search_document', 'CmsController@search_document');
  
  Route::get('/login', 'LoginController@index')->name('frontend.login');
  Route::post('/login', 'LoginController@login')->name('frontend.login.post'); 
  Route::post('/register', 'UsersController@register')->name('frontend.register');
  Route::get('/logout', 'LoginController@logout')->name('frontend.logout');

  Route::get('/', 'HomeController@index')->name('frontend.home');
  Route::get('search', 'CmsController@search')->name('frontend.search.index');

  // CMS
  // Route::get('dich-vu/{alias?}', 'CmsController@serviceCategory')->name('frontend.cms.service_category');
  // Route::get('dich-vu/{alias_category}/{alias_detail}', 'CmsController@service')->name('frontend.cms.service');

  Route::get('chuyen-khoa/{alias?}', 'CmsController@department')->name('frontend.cms.department');

  Route::get('bac-si', 'CmsController@doctorList')->name('frontend.cms.doctor.list');

  Route::get('thu-vien/{alias?}', 'CmsController@resourceCategory')->name('frontend.cms.resource_category');
  Route::get('thu-vien/{alias_category}/{alias_detail}', 'CmsController@resource')->name('frontend.cms.resource');

  //dịch vụ khám
  Route::get('dich-vu/{alias?}', 'CmsController@dichvuCategory')->name('frontend.cms.dichvu_category');
  Route::get('chi-tiet-dich-vu/{alias_detail}', 'CmsController@dichvuDetail')->name('frontend.cms.dichvu_detail');

  Route::get('profile/{alias?}', 'CmsController@postCategoryProfile')->name('frontend.cms.post_category_profile');
  Route::get('tai-lieu/{alias?}', 'CmsController@postCategoryTailieu')->name('frontend.cms.post_category_tailieu');
  Route::get('media/{alias?}', 'CmsController@postCategoryMedia')->name('frontend.cms.post_category_media');
  Route::get('xem-them-bai-viet', 'CmsController@viewMore')->name('frontend.cms.view_more');
  Route::get('tin-tuc', 'CmsController@postCategory')->name('frontend.cms.post_category_search');
  Route::get('tin-tuc/{alias?}', 'CmsController@postCategory')->name('frontend.cms.post_category');
  Route::get('thu-vien/{alias?}', 'CmsController@thuvienCategory')->name('frontend.cms.thuvien_category');
  Route::get('chi-tiet/{alias_detail}', 'CmsController@post')->name('frontend.cms.post');
  Route::get('chi-tiet-thu-vien/{alias_detail}', 'CmsController@postMedia')->name('frontend.cms.post_media');
  Route::get('chi-tiet-bac-si/{alias_detail}', 'CmsController@postDoctor')->name('frontend.cms.post_doctor');
  Route::get('tag/{alias_category?}', 'CmsController@cmstag')->name('frontend.cms.tag');

  Route::get('tim-kiem', 'CmsController@productSearch')->name('frontend.cms.product_search');
  Route::get('san-pham/{alias}', 'CmsController@productCategory')->name('frontend.cms.product_category');
  Route::get('chi-tiet-sp/{alias_detail}', 'CmsController@product')->name('frontend.cms.product');

  // Bài viết giới thiệu
  Route::get('gioi-thieu/{alias}', 'CmsController@postIntroduction')->name('frontend.cms.post_introduction');

  // Booking
  Route::post('booking', 'BookingController@store')->name('frontend.booking.store');
  // Contact
  Route::get('lien-he', 'ContactController@index')->name('frontend.contact');
  Route::post('contact', 'ContactController@store')->name('frontend.contact.store');
  // Order
  Route::post('order-service', 'OrderController@storeOrderService')->name('frontend.order.store.service');
  // Cart
  // Route::post('add-to-cart', 'OrderController@addToCart')->name('frontend.order.add_to_cart');
  Route::get('add-to-cart', 'OrderController@addToCart')->name('frontend.order.add_to_cart');
  Route::get('remove-from-cart', 'OrderController@removeCart')->name('frontend.order.cart.remove');
  Route::get('update-cart', 'OrderController@updateCart')->name('frontend.order.cart.update');
  Route::get('gio-hang', 'OrderController@cart')->name('frontend.order.cart');
  // Route::patch('update-cart', 'OrderController@updateCart')->name('frontend.order.cart.update');
  // Route::delete('remove-from-cart', 'OrderController@removeCart')->name('frontend.order.cart.remove');
  Route::post('order-product', 'OrderController@storeOrderProduct')->name('frontend.order.store.product');

  Route::get('/{alias}', 'PageController@index')->name('frontend.page');

  
  Route::group(['prefix' => 'user', 'middleware' => ['auth:web']], function () {
    
    Route::get('profile', 'UsersController@index')->name('frontend.user.index');
    Route::post('update_profile', 'UsersController@update')->name('frontend.user.update');
    Route::post('comment', 'CommentController@store')->name('frontend.comment.store');
    Route::post('addnew', 'CmsController@addnew')->name('frontend.post.addnew');
    
  });

  Route::get('auth/google', 'LoginController@redirectToGoogle')->name('login.google');
  Route::get('auth/google/callback', 'LoginController@handleGoogleCallback'); 

  Route::get('auth/facebook', 'LoginController@redirectToFacebook')->name('login.facebook');
  Route::get('auth/facebook/callback', 'LoginController@handleFacebookCallback'); 

  Route::get('/route-cache', function() {
    \Artisan::call('route:cache');
    return 'Routes cache cleared';
});
Route::get('/clear-cache', function() {
    \Artisan::call('cache:clear');
    return 'Application cache cleared';
});
});
