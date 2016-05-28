@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
  			<form method="POST" action="/addbooktocart">
  			{!! csrf_field() !!}
			<fieldset class="form-group">
				<label for="formGroupExampleInput">Name of Costomer</label>
				<input type="text" name= "customer_name" class="form-control" placeholder="John Doe">
			</fieldset>
			<fieldset class="form-group">
				<label for="formGroupExampleInput">Costomer Email</label>
				<input type="text" name= "customer_email" class="form-control" placeholder="myemail@gmail.com">
			</fieldset>
			<fieldset class="form-group">
				<label for="formGroupExampleInput2">IEEE Member Fulfilling Order</label>
				<input type="text" name= "volunteer_name" class="form-control" placeholder="John Doe">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleSelect1">Select Book</label>
				<select class="form-control" name= "book_id" id="exampleSelect1">
				  <option>Select Book</option>
				  @foreach($booksInDatabase as $book)
				  <option value="{{$book->id}}">{{$book->book_name}}</option>
				  @endforeach
				</select>
			</fieldset>
	        <button type="submit" class="btn btn-primary">Submit</button>
			</form>
        </div>
    </div>
</div>
@endsection