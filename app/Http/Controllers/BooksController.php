<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BookCart;
use App\Book;
use App\OrderedBook;
use DB;
use Mail;

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
        $this->validate($request, [
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'volunteer_name' => 'required',
            'book' => 'required',
            'confirm_email' => 'required',
        ]);
    	$bookcart = new BookCart;
    	$bookcart->customer_email=$request->customer_email;
    	$bookcart->customer_name=$request->customer_name;
    	$bookcart->volunteer_name=$request->volunteer_name;
    	$bookcart->book_id=$request->book;
	    $bookcart->save();
        return redirect('/cart');
    }
    
    public function orderPickupForm()
    {
        $status=NULL;
        return view('orderPickUp.orderStatus', compact("status"));
    }

    public function orderPickupStatus(Request $request)
    {
        $booksForPickUp = OrderedBook::where("order_code", $request->order_code)->first();
        //dd($booksForPickUp);
        if ($booksForPickUp==NULL){
           $status="Order Not Found";
        }else{
            $status="found";
        }
        return view('orderPickUp.orderStatus',compact('status','booksForPickUp'));
    }

    public function orderPickupChangeStatus(Request $request)
    {
        $booksForPickUp = OrderedBook::where("order_code", $request->order_code)->first();
        $booksForPickUp->order_status="delivered";
        $booksForPickUp->save();
        $status="delivered";
        return view('orderPickUp.orderStatus',compact('status','booksForPickUp'));
    }

}
