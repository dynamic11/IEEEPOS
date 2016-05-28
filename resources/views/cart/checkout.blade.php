@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
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
            <form method="POST" action="/processpayment">
            {!! csrf_field() !!}
            <fieldset class="form-group">
                <label for="exampleSelect1">Payment Method</label>
                <select class="form-control" name= "book_id" id="exampleSelect1">
                  <option>---Select---</option>
                  <option value="cash">Cash</option>
                  <option value="Square">Square</option>
                </select>
            </fieldset>
            <p>MAKE SURE YOU HAVE COLLECTED PAYMENT</p>
            <button type="submit" class="btn btn-primary">Complete Purchase</button>
            </form>


        </div>
        

    </div>
</div>
@endsection
