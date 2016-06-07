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
					@if ($errors->has('customer_name')) <p class="help-block" style="color:red">{{ $errors->first('customer_name') }}</p> @endif
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Costomer Email</label>
					<input type="text" name= "customer_email" class="form-control" placeholder="myemail@gmail.com">
					@if ($errors->has('customer_email')) <p class="help-block" style="color:red">{{ $errors->first('customer_email') }}</p> @endif
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">IEEE Member Fulfilling Order</label>
					<input type="text" name= "volunteer_name" class="form-control" placeholder="John Doe">
					@if ($errors->has('volunteer_name')) <p class="help-block" style="color:red">{{ $errors->first('volunteer_name') }}</p> @endif
				</fieldset>
				<fieldset class="form-group">
					<label for="exampleSelect1">Select Book</label>
					<select class="form-control" name= "book" id="exampleSelect1">
					  <option value="">Select Book</option>
					  @foreach($booksInDatabase as $book)
					  <option value="{{$book->id}}">{{$book->book_name}}</option>
					  @endforeach
					</select>
					@if ($errors->has('book')) <p class="help-block" style="color:red">{{ $errors->first('book') }}</p> @endif
				</fieldset>
				<fieldset>
					<div class="checkbox">
	                    <label>
	                      <input name= "confirm_email" type="checkbox"> I double checked customer email. If they have the wrong email they will not recieve their book.
	                    </label>
	                    @if ($errors->has('confirm_email')) <p class="help-block" style="color:red">{{ $errors->first('confirm_email') }}</p> @endif
	                </div>
                </fieldset>
		        <button type="submit" class="btn btn-primary">Add To Cart</button>
			</form>
        </div>
    </div>
</div>
@endsection