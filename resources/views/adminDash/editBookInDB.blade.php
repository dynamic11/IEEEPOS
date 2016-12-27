@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Edit Book In Database</h3>
            <form method="POST" action="/editbook/{{$bookToEdit->id}}">
                {{ method_field('PATCH')}}
                {!! csrf_field() !!}
			     <fieldset class="form-group">
    				<label for="formGroupExampleInput">Name of Book</label>
    				<input type="text" name= "book_name" class="form-control" value="{{$bookToEdit->book_name}}">
    				<label for="formGroupExampleInput">Price of Book</label>
    				<input type="text" name= "book_price" class="form-control" value="{{$bookToEdit->book_price}}"></input>
			     </fieldset>
	        <button type="submit" class="btn btn-primary">Save Book</button>
		</form>
        </div>
        
    </div>
</div>
@endsection
