<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//Disabled to Keep Site Private
// Registration Routes...
// Route::get('register', 'Auth\AuthController@showRegistrationForm');
// Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

Route::get('/home', 'HomeController@index');

//===================Preorder Book=============================
//order form for preordering book
Route::get('/preorderbook', 'BooksController@orderForm');
//add book to shippoing cart
Route::post('/addbooktocart', 'BooksController@addbooktocart');
//check status of order
Route::get('/orderstatus', 'BooksController@orderPickupForm');
Route::post('/orderstatus', 'BooksController@orderPickupStatus');
//pickup ordered book
//Route::patch('/pickup', 'BooksController@orderPickup');
Route::patch('/orderstatus', 'BooksController@orderPickupChangeStatus');

//===================Shopping Cart=============================
//show the shopping cart
Route::get('/cart', 'CartController@showCart');
Route::post('/removebookfromcart', 'CartController@removeBookFromCart');
Route::get('/checkout', 'CartController@showCheckout');
Route::post('/checkout', 'CartController@paymentProcessing');


//===================Books in Databse=============================
//show books stored in databse
Route::get('/addbooks',['middleware' => 'isAdmin', 'uses'=> 'BooksInDBController@showBooksInDatabase']);
//send new book to database
Route::post('/addbooks', ['middleware' => 'isAdmin', 'uses'=> 'BooksInDBController@addBooksToDatabase']);
//activate or deactivate book
Route::post('/ChangeBookStatus', ['middleware' => 'isAdmin', 'uses'=> 'BooksInDBController@ChangeBookStatus']);
//edit form for book details in database
Route::get('/editbook/{bookToEdit}', ['middleware' => 'isAdmin', 'uses'=> 'BooksInDBController@editFormBooksInDatabase']);
//send changes to book to DB
Route::patch('/editbook/{bookToEdit}', ['middleware' => 'isAdmin', 'uses'=> 'BooksInDBController@editBooksInDatabase']);

//===================Dashboard=============================
//show the shopping cart
Route::get('/dash', ['middleware' => 'isAdmin', 'uses'=> 'DashController@showDashboard']);
Route::get('/ordermonitoring', ['middleware' => 'isAdmin', 'uses'=> 'DashController@showOrders']);
Route::post('/ordermonitoring', ['middleware' => 'isAdmin', 'uses'=> 'DashController@distributeAvailableBooks']);