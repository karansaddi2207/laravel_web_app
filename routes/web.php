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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

//social logins

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider')->name('user.login');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['namespace'=>'User'],function(){

	Route::get('/user/favourites','User_controller@favourites')->name('user.favourites');
	Route::post('/user/favourites','User_controller@favourites');

	Route::get('/user/location','User_controller@location')->name('user.location');

	Route::get('/user/ticket_options','User_controller@ticket_options')->name('user.ticket_options');

	Route::get('/user/point_of_interest','User_controller@point_of_interest')->name('user.point_of_interest');

	Route::get('/user/ticket/booking/{id}','User_controller@booking')->name('user.ticket.booking');
	//for stripe payment
	Route::post('/user/ticket/booking/{id}','User_controller@booking');
	//for subscription when you want to charge after anytime you can charge it by excuting this function
	Route::get('/user/ticket/subscriptions/{id}','User_controller@subscriptions');

	Route::post('/user/filter','User_controller@filter');

	Route::post('/user/sort','User_controller@sort');

	Route::get('/user/poi_detail/{id}','User_controller@poi_detail')->name('user.poi_detail');

});

Route::group(['namespace'=>'Admin'],function(){

	Route::get('/admin/home','Admin_controller@home')->name('admin.home');
	Route::resource('/admin/ticket','Ticket_controller');
	Route::resource('/admin/poi','Poi_controller');


	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
    //Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();