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


Route::get('/preorderbook', 'BooksController@orderForm');
Route::post('/addbooktocart', 'BooksController@addbooktocart');

Route::get('/cart', 'CartController@showCart');

Route::get('/addbooks', 'BooksInDBController@showBooksInDatabase');
Route::post('/addbooks', 'BooksInDBController@addBooksToDatabase');
Route::post('/removeBookFromDatabase', 'BooksInDBController@RemoveBookFromDatabase');

Route::get('/editbook/{bookToEdit}', 'BooksInDBController@editFormBooksInDatabase');
Route::patch('/editbook/{bookToEdit}', 'BooksInDBController@editBooksInDatabase');
