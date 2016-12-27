
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<div class="alert alert-danger">
  				<strong>Danger!</strong> </br>This area is very dangerous! Unless you have approval please exit immediately.</br>
  				<b> Any changes to the order will send out a new email to the customer. </b>
			</div>
  			<form method="POST" action="/editorder/{{$orderToEdit->id}}">
  				{{ method_field('PATCH')}}
	  			{!! csrf_field() !!}
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Name of Customer</label>
					<input type="text" name= "customer_name" class="form-control" value="{{$orderToEdit->customer_name}}">
					@if ($errors->has('customer_name')) <p class="help-block" style="color:red">{{ $errors->first('customer_name') }}</p> @endif
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Customer Email</label>
					<input type="text" name= "customer_email" class="form-control" value="{{$orderToEdit->customer_email}}">
					@if ($errors->has('customer_email')) <p class="help-block" style="color:red">{{ $errors->first('customer_email') }}</p> @endif
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Confirm Customer Email</label>
					<input type="text" name= "confirm_customer_email" class="form-control" value="{{$orderToEdit->customer_email}}">
					@if ($errors->has('confirm_customer_email')) <p class="help-block" style="color:red">{{ $errors->first('confirm_customer_email') }}</p> @endif
				</fieldset>				
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">IEEE Member Fulfilling Order</label>
					<input type="text" name= "volunteer_name" class="form-control" value="{{$orderToEdit->volunteer_name}}">
					@if ($errors->has('volunteer_name')) <p class="help-block" style="color:red">{{ $errors->first('volunteer_name') }}</p> @endif
				</fieldset>
				<fieldset class="form-group">
					<label for="exampleSelect1">Select Book</label>
					<select class="form-control" name= "book" id="exampleSelect1">
					  <option value="">Select Book</option>
					  @foreach($booksInDatabase as $book)
						  @if ($book->id == $orderToEdit->book_id)
	  						  <option selected="selected" value="{{$book->id}}"> {{$book->book_name}} ---> ${{$book->book_price}}</option>
						  @else
						  	<option value="{{$book->id}}"> {{$book->book_name}} ---> ${{$book->book_price}}</option>
						  @endif
					  @endforeach
					</select>
					@if ($errors->has('book')) <p class="help-block" style="color:red">{{ $errors->first('book') }}</p> @endif
				</fieldset>

				<fieldset class="form-group">
					<label for="exampleSelect1">Edit Status</label>
					<select class="form-control" name= "status" id="exampleSelect1">
					  <option @if ($orderToEdit->order_status == "delivered")selected="selected"@endif value="delivered">delivered</option>
					  <option @if ($orderToEdit->order_status == "ordered")selected="selected"@endif value="ordered">ordered</option>
					  <option @if ($orderToEdit->order_status == "available")selected="selected"@endif value="available">available</option>
  					  <option @if ($orderToEdit->order_status == "void")selected="selected"@endif value="void">void</option>
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
		        <button type="submit" class="btn btn-primary">Save & Send Email</button>
			</form>
        </div>
    </div>
</div>
@endsection

