<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BookCart;
use App\Book;
use DB;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function orderForm()
    {
    	$booksInDatabase= DB::table('books')->where('status', 'active')->get();
        return view('books.bookOrderForm', compact("booksInDatabase"));
    }

    public function addbooktocart(Request $request)
    {
    	$bookcart = new BookCart;
    	$bookcart->customer_email=$request->customer_email;
    	$bookcart->customer_name=$request->customer_name;
    	$bookcart->volunteer_name=$request->volunteer_name;
    	$bookcart->book_id=$request->book_id;
	    $bookcart->save();
        return redirect('/');
    }
    
}
