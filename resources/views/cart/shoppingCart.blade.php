@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
        <h1>Shopping Cart</h1>
            @if ($booksInCart->isEmpty())
                    <p>cart is empty</p>
                    <a href="/preorderbook" class="btn btn-primary">+ Add Book To Cart</a>
                @else
                    <ul style="list-style-type: none; padding:0px">
                        @foreach($booksInCart as $bookInCart)
                            <li class="pull-left" style="width:250px; padding:5px 5px; background-color:#f8f5f0;">{{$bookInCart->book->book_name}} ----> {{$bookInCart->book->book_price}}</li>
                                <form method="POST" action="/removebookfromcart">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="book_id" value="{{$bookInCart->id}}" style="display-inline-block">
                                    <button type="submit" class="btn btn-danger" style="line-height:5px; padding:10px;"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
                                </form>
                        @endforeach
                    </ul>
                    <a href="/checkout" class="btn btn-primary">Procees To Checkout</a>
                    <a href="/preorderbook" class="btn btn-primary">+ Add Another Book To Cart</a>
                @endif
        </div>
        <div class="col-md-4 alert alert-dismissible alert-info" style="margin-top:20px;">
            <ul>
                <p>Amount To pay</p>
                <?php $totalPrice=0 ?>
                @foreach($booksInCart as $bookInCart)
                    <li>{{$bookInCart->book->book_name}}---->{{$bookInCart->book->book_price}}</li>
                    <?php $totalPrice+=$bookInCart->book->book_price ?>
                @endforeach
                <p>_______________________________</p>
                <?php echo("<p>Total: $". $totalPrice ."</p>") ?>
            </ul>
        </div>
    </div>
</div>
@endsection
