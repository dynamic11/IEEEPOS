@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul>
                @foreach($booksInDatabase as $book)
                    <li>{{$book->book_name}}---->
                <form method="POST" action="/removeBookFromDatabase">
		  			{!! csrf_field() !!}
		  			<input type="hidden" name="book_id" value="{{$book->id}}">
			        <button type="submit" class="btn btn-primary">Delete</button>
				</form>
                      </li>
                @endforeach

            </ul>

            <form method="POST" action="/addbooks">
  			{!! csrf_field() !!}
			<fieldset class="form-group">
				<label for="formGroupExampleInput">Name of Book</label>
				<input type="text" name= "book_name" class="form-control" placeholder="Ex: ECOR 1010">
			</fieldset>
	        <button type="submit" class="btn btn-primary">Submit</button>
		</form>
        </div>
        
    </div>
</div>
@endsection
