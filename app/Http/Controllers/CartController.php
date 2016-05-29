<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BookCart;
use App\OrderedBook;
use Carbon\Carbon;


class CartController extends Controller
{
    public function showCart()
    {
    	$booksInCart = BookCart::all();
        return view('cart.shoppingCart', compact('booksInCart'));
    }

    public function removeBookFromCart(Request $request)
    {
    	$booksToDelete = BookCart::findOrFail($request->book_id);
    	$booksToDelete->delete();
        return redirect("/cart");
    }
    public function showCheckout()
    {
    	$booksInCart = BookCart::all();
        return view('cart.checkout', compact('booksInCart'));
    }

    public function paymentProcessing(Request $request)
    {
    	//needs to be implemented
    	$booksInCart = BookCart::all();
    	foreach ($booksInCart as $books){
    		$orderedBook = new orderedBook;
    		$orderedBook->book_id = $books->book_id;
    		$orderedBook->volunteer_name = $books->volunteer_name;
    		$orderedBook->customer_name = $books->customer_name;
    		$orderedBook->customer_email = $books->customer_email;
    		$orderedBook->order_status = "ordered";
    		$orderedBook->order_date = Carbon::now();
    		$orderedBook->order_code = "need to fix";
    		$orderedBook->payment_type = $request->payment_type;
    		$orderedBook->save();
    		$books->delete();
    	}
        return redirect('/');
    }
    
}
