<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;

class BooksInDBController extends Controller
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
   
	public function addBooksToDatabase(Request $request)
    {
    	$newBook = new Book;
    	$newBook->book_name=$request->book_name;
    	$newBook->book_price=$request->book_price;
    	$newBook->status="active";
	    $newBook->save();
        return Redirect('/addbooks');
    }

    public function showBooksInDatabase()
    {
    	$booksInDatabase= Book::all();
        return view('adminDash.booksInDB',compact('booksInDatabase'));
    }

    public function ChangeBookStatus(Request $request)
	{
	    $bookToDelete = Book::findOrFail($request->book_id);
	    if($bookToDelete->status=="active"){
	    	$bookToDelete->status="deactivated";
	    }else{
	    	$bookToDelete->status="active";
	    }
	    
	    $bookToDelete->save();
    	return Redirect('/addbooks');
	}

    public function editFormBooksInDatabase(Book $bookToEdit)
    {
        return view('adminDash.editBookInDB',compact('bookToEdit'));
    }

    public function editBooksInDatabase(Request $request, Book $bookToEdit)
    {
    	$book = Book::find($bookToEdit->id);
		$book->book_name = $request->book_name;
		$book->book_price= $request->book_price;

		$book->save();
        return Redirect('/addbooks');
    }

}
