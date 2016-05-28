<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BookCart;

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
    
}
