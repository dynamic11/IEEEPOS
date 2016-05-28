@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<h3>Books in Database</h3>
        	<p>untill all orders are delivered do not delete any books</p>
            <ul>
                @foreach($booksInDatabase as $book)
                    <li>{{$book->book_name}}---->${{$book->book_price}}
			        <a href="editbook/{{$book->id}}"class="btn btn-primary">Edit</a>
                <form method="POST" action="/removeBookFromDatabase">
		  			{!! csrf_field() !!}
		  			<input type="hidden" name="book_id" value="{{$book->id}}">
			        <button type="submit" class="btn btn-primary">Delete</button>
				</form>
                      </li>
                @endforeach

            </ul>
            <h3>Add Book To Database</h3>
            <form method="POST" action="/addbooks">
  			{!! csrf_field() !!}
			<fieldset class="form-group">
				<label for="formGroupExampleInput">Name of Book</label>
				<input type="text" name= "book_name" class="form-control" placeholder="Ex: ECOR 1010">
				<label for="formGroupExampleInput">Price of Book</label>
				<input type="text" name= "book_price" class="form-control" placeholder="Ex: 20">
			</fieldset>
	        <button type="submit" class="btn btn-primary">Add Book</button>
		</form>
        </div>
        
    </div>
</div>
@endsection
