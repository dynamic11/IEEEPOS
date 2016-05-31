@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @if($status==NULL)
                <h3>Check status of book order</h3>
                <form method="POST" action="/pickup">
                    {!! csrf_field() !!}
                    <fieldset class="form-group">
                        <label for="formGroupExampleInput">Order Code</label>
                        <input type="text" name= "order_code" class="form-control" placeholder="Ex. Yz17S2">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @elseif ($status=="Order Not Found")
                <h3>Order Status</h3>
                <p>order not found based on provided code. Please double check inputed code</p>

            @else
                <h3>Order Status</h3>
                <p>{{$booksForPickUp->order_status}}</p>
                <p>{{$booksForPickUp->book->book_name}}</p>
            @endif

        </div>
    </div>
</div>
@endsection