<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BookCart;
use App\OrderedBook;
use Carbon\Carbon;
use Mail;



class CartController extends Controller
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
        if($booksInCart->isEmpty()){
            
            return redirect('/');

        }else{

            return view('cart.checkout', compact('booksInCart'));

        }
    }

    public function paymentProcessing(Request $request)
    {
            $this->validate($request, [
                'payment_type' => 'required',
                'confirm_payment' => 'required',
            ]);

    	//needs to be implemented
    	$booksInCart = BookCart::all();

        if($booksInCart->isEmpty()){
            
            return redirect('/');

        }else{
            foreach ($booksInCart as $books){
                $uniqueCode_found=false;
                
                while($uniqueCode_found == false){
                    $order_code = str_random(6);
                    if(orderedBook::where("order_code", $order_code)->get()->isEmpty()){
                        $uniqueCode_found=true;
                    }
                }
                $orderedBook = new orderedBook;
                $orderedBook->book_id = $books->book_id;
                $orderedBook->volunteer_name = $books->volunteer_name;
                $orderedBook->customer_name = $books->customer_name;
                $orderedBook->customer_email = $books->customer_email;
                $orderedBook->order_status = "ordered";
                $orderedBook->order_date = Carbon::now();
                $orderedBook->order_code = $order_code;
                $orderedBook->payment_type = $request->payment_type;
                $orderedBook->save();
                $books->delete();

                Mail::send('emails.invoice', ['orderedBook'=> $orderedBook], function ($m) use ($orderedBook){
                    $m->from('no_reply@ieeecarleton.ca', 'IEEE Carleton');
                    $m->to($orderedBook->customer_email, $orderedBook->customer_name)->subject($orderedBook->book->book_name.' '.'Book Order');
                });

            }
            return redirect('/');
        }


    }
    
}
