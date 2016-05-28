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
}
