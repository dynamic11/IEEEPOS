<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
Use App\Book;
Use App\OrderedBook;
Use Mail;
Use Auth;
use DB;
use App\User;

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
        if(Auth::User()->isAdmin()){
            return view('adminDash.dashboard');
        }else{
            return view('adminDash.dashboardLite');
        }
    }

 	public function showOrders()
    {
        $allPurchases = OrderedBook::where('isArchived', false)->get();
        if(Auth::User()->isAdmin()){
            $allBooks = Book::where('status', 'active')->get();
            $orders = array();
                foreach($allBooks as $book) {
                    $numberOfOrders = OrderedBook::where("order_status","ordered")->where("book_id",$book->id)->count();
                    $jj=array($book->id, $book->book_name, $numberOfOrders);
                    array_push($orders, $jj);
                }//end foreach

            return view('adminDash.checkOrders',compact("orders","allPurchases"));
        }else{
            return view('adminDash.checkOrdersLite',compact("allPurchases"));
        }

    }

 	public function distributeAvailableBooks(Request $request)
    {
    	$orderedBooks = OrderedBook::where("order_status","ordered")->where("book_id",$request->book_id)->orderBy('order_date', 'asc')->take($request->numberOfAvailableBooks)->get();
    	//$avaiablebooks= $request->numberOfAvailableBooks;
		foreach($orderedBooks as $orderedBook) {
			//$avaiablebooks--;
			$orderedBook->order_status="available";
			
			Mail::send('emails.pickup', ['orderedBook'=> $orderedBook], function ($m) use ($orderedBook){
                $m->from('no_reply@ieeecarleton.ca', 'IEEE Carleton');
                $m->to($orderedBook->customer_email, $order->customer_name)->subject('Your '. $orderedBook->book->book_name.' book is now available');
            });

            $orderedBook->save();
		}//end foreach

        return redirect("/ordermonitoring");
    }

    public function editOrderForm(OrderedBook $orderToEdit)
    {
        $booksInDatabase= DB::table('books')->where('status', 'active')->get();
        return view('adminDash.orderEditForm',compact('orderToEdit','booksInDatabase'));
    }

    public function editOrder(Request $request, OrderedBook $orderToEdit)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'confirm_customer_email' => 'required|email|same:customer_email',
            'volunteer_name' => 'required',
            'book' => 'required',
            'confirm_email' => 'required',
        ]);
        $order = OrderedBook::find($orderToEdit->id);
        $order->customer_email=$request->customer_email;
        $order->customer_name=$request->customer_name;
        $order->volunteer_name=$request->volunteer_name;
        $order->book_id=$request->book;
        $order->order_status=$request->status;

        if($order->order_status=='available'){
            Mail::send('emails.pickup', ['orderedBook'=> $order], function ($m) use ($order){
                $m->from('no_reply@ieeecarleton.ca', 'IEEE Carleton');
                $m->to($order->customer_email, $order->customer_name)->subject('Your '. $order->book->book_name.' book is now available');
            });
        }elseif ($order->order_status=='ordered'){
            Mail::send('emails.invoice', ['orderedBook'=> $order], function ($m) use ($order){
                $m->from('no_reply@ieeecarleton.ca', 'IEEE Carleton');
                $m->to($order->customer_email, $order->customer_name)->subject('Your '. $order->book->book_name.' book is now available');
            });
        }elseif ($order->order_status=='delivered'){
            Mail::send('emails.thankyou', ['orderedBook'=> $order], function ($m) use ($order){
                $m->from('no_reply@ieeecarleton.ca', 'IEEE Carleton');
                $m->to($order->customer_email, $order->customer_name)->subject('Your '. $order->book->book_name.' book is now available');
            });
        }

        $order->save();

        return redirect('/ordermonitoring');

    }

    public function archiveOrders(Request $request)
    {
        $request['validate_Message']="I have permission to archive all the above orders";

        $this->validate($request, [
            'testQuestion' => 'required|same:validate_Message',  
        ]);
        $orders = OrderedBook::where('isArchived', false)->get();
        foreach($orders as $order) {
            $order->isArchived=true;
            $order->save();
        }

        return redirect('/ordermonitoring');

    }

    public function showArchivedOrders()
    {
        $allPurchases = OrderedBook::where('isArchived', true)->get();
        return view('adminDash.checkOrdersArchive',compact("allPurchases"));

    }
}
