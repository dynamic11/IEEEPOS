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
                <h3>BOOK HAS BEEN DELIVERED!</h3>
                <p>Thank you for supporting your IEEE office</p>

            @elseif ($status=="Order Not Found")
                <h3>Order Status</h3>
                <i class="fa fa-exclamation-triangle fa-3x pull-left" aria-hidden="true"></i>
                <p>Order not found based on provided code. </br> Please double check the provided code.</p>

            @else
                <h3>Order Status</h3>
                @if($booksForPickUp->order_status=="available")
                    <i class="fa fa-check-circle fa-3x pull-left" style="color: #93c54b" aria-hidden="true"></i>
                    <p>{{$booksForPickUp->book->book_name}}</br>
                    <b>Order is available for pick-up</b></p>
                    <form method="POST" action="/orderstatus">
                        {{ method_field('PATCH')}}
                        {!! csrf_field() !!}
                        <fieldset class="form-group">
                            <input type="hidden" name= "order_code" class="form-control" value="{{$booksForPickUp->order_code}}">
                        </fieldset>
                        <button type="submit" class="btn btn-primary">Click Here To Pick Up</button>
                    </form>
                @elseif($booksForPickUp->order_status=="delivered")
                    <i class="fa fa-shopping-bag fa-3x pull-left" aria-hidden="true"></i>
                    <p>{{$booksForPickUp->book->book_name}}</br>
                    <b>Order has been delivered.</b></p>
                @else
                    <i class="fa fa-times-circle fa-3x pull-left" style="color: #d9534f;"aria-hidden="true"></i>
                    <p>{{$booksForPickUp->book->book_name}}</br>
                    @if($booksForPickUp->order_status=='void')
                        <b>The order has expired due to delayed pick-up. (code: {{$booksForPickUp->order_status}})</p></b>
                    @else
                        <b>Order is not available for pick-up.</b></p>
                    @endif
                    </p>
                @endif
            @endif

        </div>
    </div>
</div>
@endsection