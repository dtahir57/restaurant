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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\adminController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\adminController@login')->name('admin.login.submit');
  Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('/', 'adminController@index');
    Route::get('/create-menu', 'MenuController@index')->name('create.menu');
    Route::get('/restaurant', 'RestaurantCont@index')->name('restaurant');
    Route::post('/restaurant', 'RestaurantCont@create')->name('create-restaurant');
    Route::get('/category', 'CategoryCont@index')->name('addCategory');
    Route::get('/show-menu', 'MenuController@getMenuDetails')->name('get-Menu');
    Route::post('/category', 'CategoryCont@create')->name('createCategory');
    Route::get('/category/updateStatus/{ca}', 'CategoryCont@updateStatus');
    Route::get('/{ca}/edit_category', 'CategoryCont@edit');
    Route::post('/category/{data}', 'CategoryCont@update');
    Route::get('/category/{ca}', 'CategoryCont@delete');
    Route::get('/{g}/edit_menu', 'MenuController@edit');
    Route::post('/show-menu/{data}', 'MenuController@update');
    Route::get('/show-menu/{g}', 'MenuController@delete');
    Route::get('/manage_restaurants', 'RestaurantCont@showAllRestaurant')->name('manageRestaurants');
    Route::get('/{r}/edit_restaurant', 'RestaurantCont@edit');
    Route::post('/manage_restaurants/{res}', 'RestaurantCont@update');
    Route::get('/manage_restaurants/{r}', 'RestaurantCont@delete');
    Route::get('/manage_time/{r}', 'RestaurantCont@manageTime');
    Route::post('/manage_time/{r}', 'hoursCont@set')->name('manageTiming');
    Route::get('/update_time', 'RestaurantCont@manageTime');
    Route::post('/update_time', 'hoursCont@updateTime');
    Route::get('/manage-reservation/{r}', 'ReservationController@show');
    Route::get('/manage-reservation/del/{reserved}', 'ReservationController@del');
    Route::resource('/sub/subItems','SubItemsCont');
    Route::get('sub/subItems', 'SubItemsCont@index')->name('subitem');
    Route::post('sub/subItems', 'SubItemsCont@store')->name('subItems.store');
    Route::get('sub/viewall', 'SubItemsCont@getMenuId')->name('getMenuId');
    Route::post('sub/viewall', 'SubItemsCont@sort')->name('sort');
    Route::get('sub/{it}/editSubItem', 'SubItemsCont@edit')->name('subEdit');
    Route::post('sub/viewall/{getId}', 'SubItemsCont@update');
    Route::get('sub/viewall/{it}', 'SubItemsCont@destroy');
    Route::get('guestDetails','guestController@getall')->name('guestDetails');
    Route::get('/getCart/{g}', 'guestController@getCart');
    Route::get('/user-orders', 'OrderCont@index')->name('allUsers');
    Route::get('/user-details/{order}', 'OrderCont@show');
    Route::post('/braintree-checkout/userOrder', 'BraintreeCont@userOrder')->name('userOrder');
  });
});
Route::post('admin/create-menu', 'MenuController@save')->name('save');
Route::get('about', function(){
  return view('about');
})->name('about');
Route::prefix('users')->group(function(){
  Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
  Route::get('/checkout/user', 'BraintreeCont@user')->name('orders');
  Route::post('/checkout', 'HomeController@createOrder')->name('createOrder');
  Route::get('/dashboard/{h}', 'HomeController@displaySingle');
});
Route::get('menu', 'MenuController@showMenu')->name('menu');
Route::get('menu/{c}', 'MenuController@singleItem')->name('singleItem');
Route::get('show-restaurant', 'RestaurantCont@show')->name('showRestaurant');
Route::get('single-show-restaurant/{restaurant}', 'RestaurantCont@showSingle');
Route::post('single-show-restaurant/{restaurant}', 'ReservationController@store');
Route::resource('/cart', 'cartCont');
Route::get('cart/','cartCont@index')->name('cart');
Route::get('cart/{menu}/edit/', 'cartCont@edit');
Route::get('cart/{s}/show/', 'SubItemsCont@show');
Route::get('cart/{cart}', 'cartCont@destroy');
Route::get('guest', 'guestController@index')->name('guestOrder');
Route::post('guest/guestview', 'guestController@store')->name('storeGuest');
Route::get('subitem/getSubItems/{menu}', 'SubItemsCont@getSubItems');
Route::get('guest/guestView', 'BraintreeCont@guest')->name('method');
Route::get('guest/paypal', 'guestController@store');
Route::post('guest/braintree/addOrder','BraintreeCont@addOrder')->name('braintree');
Route::post('/', 'MessageController@store')->name('contact');
