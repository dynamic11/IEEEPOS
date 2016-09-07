@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @if($status==NULL)
                <h3>Check status of book order</h3>
                <form method="POST" action="/orderstatus">
                    {!! csrf_field() !!}
                    <fieldset class="form-group">
                        <label for="formGroupExampleInput">Order Code</label>
                        <input type="text" name= "order_code" class="form-control" placeholder="Ex. Yz17S2">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @elseif ($status=="delivered")
                <h3>BOOK HAS BEEN DELIVEREsD!</h3>
                <p>Thank you for supporting your IEEE office</p>

            @elseif ($status=="Order Not Found")
                <h3>Order Status</h3>
                <p>order not found based on provided code. Please double check inputed code</p>

            @else
                <h3>Order Status</h3>
                <p>{{$booksForPickUp->order_status}}</p>
                <p>{{$booksForPickUp->book->book_name}}</p>
                @if($booksForPickUp->order_status=="available")
                    <form method="POST" action="/orderstatus">
                        {{ method_field('PATCH')}}
                        {!! csrf_field() !!}
                        <fieldset class="form-group">
                            <input type="hidden" name= "order_code" class="form-control" value="{{$booksForPickUp->order_code}}">
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Click Here To Pick Up</button>
                    </form>
                @endif
            @endif

        </div>
    </div>
</div>
@endsection