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

//Back end
Route::get('/','HomeController@index');

Route::get('/dashboard','HomeDashboardController@index');
Route::group(['prefix' => 'dashboard'], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('producttype', 'ProductTypeController');
    Route::resource('product', 'ProductController');
    Route::get('product/update/{id}','ProductController@edit')->name('edit.product.list');
    Route::post('product/update/{id}','ProductController@update')->name('product.update');
    Route::resource('order', 'OrderController');
    Route::get('order/view/{id}','OrderController@edit')->name('get.view.list.id');
    Route::get('order/action/{id}-{active}','OrderController@actionorder')->name('get.view.action.order');
    Route::get('order/check/{id}-{active}','OrderController@destroy')->name('huy.don.hang.backend');
    Route::resource('banner', 'BannerController');
    Route::get('edit/{id}','BannerController@edit')->name('edit.banner');
    Route::get('update/{id}-{status}','BannerController@update')->name('update.banner');
    Route::resource('blog', 'BlogController');
    Route::post('blog/update/{id}','BlogController@update')->name('update.blog');
    Route::get('reviews', 'ProductReviewsController@index_dashboard')->name('list.product.reviews');
    Route::get('reviews/show/{id}', 'ProductReviewsController@show1')->name('show.product.reviews.active');
    Route::get('reviews/hidden/{id}', 'ProductReviewsController@hidden')->name('hidden.product.reviews.active');
});


//Frontend
Route::get('dang-nhap','ManagerUserController@index')->name('login.index.list');
Route::post('dang-ky','ManagerUserController@registration')->name('registration.index.list');
Route::post('dang-nhap','ManagerUserController@login')->name('login.index.list');
Route::get('dang-xuat/{id}','ManagerUserController@logout')->name('logout.index.list');
Route::get('dang-nhap/{social_id}','ManagerUserController@redirectToProvider');
Route::get('callback/{social_id}','ManagerUserController@handleProviderCallback');
Route::get('dang-nhap/{social_gg}','ManagerUserController@redirectToProviderGG');
Route::get('callback/{social_gg}','ManagerUserController@handleProviderCallbackGG');
Route::get('danh-muc/{slug}-{id}','HomeController@getDetail')->name('category.slug');
Route::get('quan-ly/danh-muc/{id}','HomeController@categorylist')->name('category.list');
Route::get('chi-tiet-san-pham/{slug}-{id}','ProductHomeController@productdetail')->name('product.detail.list');
Route::get('chi-tiet-san-pham/{id}','ProductHomeController@productdetailrender')->name('product.detail.list.render');
Route::get('mua-hang/{id}','CartHomeController@addcart')->name('add.cart.list');
Route::get('chi-tiet/gio-hang','CartHomeController@listcart')->name('list.cart');
Route::post('chi-tiet/gio-hang/cap-nhat/{id}','CartHomeController@update');
Route::get('chi-tiet/gio-hang/xoa/{id}','CartHomeController@delete')->name('delelte.list');
Route::get('quan-ly/dat-hang','CartHomeController@checkout')->name('check.out');
Route::post('quan-ly/dat-hang/{idUser}','CartHomeController@order')->name('check.order.insert');
Route::get('quan-ly/theo-doi-don-hang','HomeController@orderDetail')->name('manager.order.detail');
Route::get('quan-ly/theo-doi-don-hang/{id}-{active}','HomeController@destroy')->name('huy.don.hang');
Route::post('tim-kiem/san-pham','HomeController@search')->name('search.list');
Route::get('tim-kiem/san-pham/mua-hang/{id}','CartHomeController@addcartsearch')->name('add.cart.list.create');
Route::get('blog/{slug}-{id}','HomeController@blogcheck')->name('blog.index.list');
Route::get('add-wishlist/{id}','WistlistController@store')->name('add.wishlist');
Route::get('danh-muc-wishlist/','WistlistController@index')->name('list.wishlist');
Route::get('danh-muc-wishlist/{id}','WistlistController@destroy');
Route::get('chi-tiet/gio-hang/xoa-all/{id}','CartHomeController@deleteall');
Route::post('chi-tiet-san-pham/danh-gia-san-pham/{id}','ProductReviewsController@index')->name('danh.gia.product');
Route::get('/autocomplete','ProductHomeController@autocomplete')->name('auto.complete');
Route::get('/autosimple','ProductHomeController@autosimple')->name('auto.autosimple');
Route::get('/mail','ProductHomeController@sendMail')->name('send.mail');