@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <h1>Shopping Cart</h1>
            @if ($booksInCart->isEmpty())
                    <p>cart is empty</p>
                    <a href="/preorderbook" class="btn btn-primary">+ Add Book To Cart</a>
                @else
                    <ul>
                        @foreach($booksInCart as $bookInCart)
                            <li>{{$bookInCart->book->book_name}}---->{{$bookInCart->book->book_price}}</li>
                                <form method="POST" action="/removebookfromcart">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="book_id" value="{{$bookInCart->id}}">
                                    <button type="submit" class="btn btn-danger">Remove From Cart</button>
                                </form>
                        @endforeach
                    </ul>
                    <a href="/checkout" class="btn btn-primary">Procees To Checkout</a>
                    <a href="/preorderbook" class="btn btn-primary">+ Add Another Book To Cart</a>
                @endif
        </div>
        <div class="col-md-3">
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
