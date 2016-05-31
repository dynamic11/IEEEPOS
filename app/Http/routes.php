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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//===================Preorder Book=============================
//order form for preordering book
Route::get('/preorderbook', 'BooksController@orderForm');
//add book to shippoing cart
Route::post('/addbooktocart', 'BooksController@addbooktocart');
//pickup ordered book
Route::get('/pickup', 'BooksController@orderPickupForm');
//pickup ordered book
Route::post('/pickup', 'BooksController@orderPickupStatus');

//===================Shopping Cart=============================
//show the shopping cart
Route::get('/cart', 'CartController@showCart');
Route::post('/removebookfromcart', 'CartController@removeBookFromCart');
Route::get('/checkout', 'CartController@showCheckout');
Route::post('/checkout', 'CartController@paymentProcessing');


//===================Books in Databse=============================
//show books stored in databse
Route::get('/addbooks', 'BooksInDBController@showBooksInDatabase');
//send new book to database
Route::post('/addbooks', 'BooksInDBController@addBooksToDatabase');
//activate or deactivate book
Route::post('/ChangeBookStatus', 'BooksInDBController@ChangeBookStatus');
//edit form for book details in database
Route::get('/editbook/{bookToEdit}', 'BooksInDBController@editFormBooksInDatabase');
//send changes to book to DB
Route::patch('/editbook/{bookToEdit}', 'BooksInDBController@editBooksInDatabase');

//===================Dashboard=============================
//show the shopping cart
Route::get('/dash', 'DashController@showDashboard');
