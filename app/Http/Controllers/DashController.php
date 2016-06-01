<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
Use App\Book;
Use App\OrderedBook;

class DashController extends Controller
{
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
		foreach($orderedBooks as $book) {
			//$avaiablebooks--;
			$book->order_status="available";
			$book->save();
			//if ($avaiablebooks==0){
			//	break;
			//}
		}//end foreach

        return redirect("/");
    }
}
