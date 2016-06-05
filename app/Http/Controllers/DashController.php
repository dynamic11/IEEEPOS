<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
Use App\Book;
Use App\OrderedBook;
Use Mail;

class DashController extends Controller
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

    public function showDashboard()
    {
        return view('adminDash.dashboard');
    }

 	public function showOrders()
    {
    	$allBooks = Book::all();
		$orders = array();
    		foreach($allBooks as $book) {
    			$numberOfOrders = OrderedBook::where("order_status","ordered")->where("book_id",$book->id)->count();
    			$jj=array($book->id, $book->book_name, $numberOfOrders);
    			array_push($orders, $jj);
    		}//end foreach

        return view('adminDash.checkOrders',compact("orders"));
    }

 	public function distributeAvailableBooks(Request $request)
    {
    	$orderedBooks = OrderedBook::where("order_status","ordered")->where("book_id",$request->book_id)->orderBy('order_date', 'desc')->take($request->numberOfAvailableBooks)->get();
    	//$avaiablebooks= $request->numberOfAvailableBooks;
		foreach($orderedBooks as $orderedBook) {
			//$avaiablebooks--;
			$orderedBook->order_status="available";
			
			Mail::send('emails.pickup', ['orderedBook'=> $orderedBook], function ($m) use ($orderedBook){
                $m->from('no_reply@alinouri.link', 'IEEE Carleton');
                $m->to($orderedBook->customer_email, "ali")->subject('Your '. $orderedBook->book->book_name.' book is now available');
            });

            $orderedBook->save();
		}//end foreach

        return redirect("/");
    }
}
