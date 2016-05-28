<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;

class BooksInDBController extends Controller
{
   
	public function addBooksToDatabase(Request $request)
    {
    	$newBook = new Book;
    	$newBook->book_name=$request->book_name;
	    $newBook->save();
        return Redirect('/addbooks');
    }

    public function showBooksInDatabase()
    {
    	$booksInDatabase= Book::all();
        return view('adminDash.booksInDB',compact('booksInDatabase'));
    }

    public function RemoveBookFromDatabase(Request $request)
	{
	    $bookToDelete = Book::findOrFail($request->book_id);
	    $bookToDelete->delete();
    	return Redirect('/addbooks');
	}
}
