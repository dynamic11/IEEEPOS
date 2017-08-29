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
            <form method="POST" action="/checkout">
            {!! csrf_field() !!}

            <fieldset class="form-group">
                <label for="exampleSelect1">Payment Method</label>
                <select name= "payment_type" class="form-control"  id="exampleSelect1">
                  <option value="">---Select---</option>
                  <option value="cash">Cash</option>
                  <option value="Square">Square</option>
                </select>
                @if ($errors->has('payment_type')) <p class="help-block" style="color:red">{{ $errors->first('payment_type') }}</p> @endif
                <div class="checkbox">
                    <label>
                      <input name= "confirm_payment" type="checkbox"> I have collected the money for this order
                    </label>
                    @if ($errors->has('confirm_payment')) <p class="help-block" style="color:red">{{ $errors->first('confirm_payment') }}</p> @endif
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Complete Purchase</button>
            </form>

   <button  id="squareButton" class="btn btn-primary">Square</button>
        </div>
        

    </div>

    <script>
    document.getElementById("squareButton").addEventListener("click", function(){
        var dataParameter = {
            "amount_money": {
              "amount" : "25",
              "currency_code" : "CAD"
            },
            "callback_url" : "http://159.203.23.90", // Replace this value with your application's callback URL
            "client_id" : "sandbox-sq0idp-uPsZe4Id6AHglQEhpZwx3A", // Replace this value with your application's ID
            "version": "1.3",
            "notes": "notes for the transaction",
            "options" : {
              "supported_tender_types" : ["CREDIT_CARD","CASH","OTHER","SQUARE_GIFT_CARD","CARD_ON_FILE"]
            }
          };
      window.location = "square-commerce-v1://payment/create?data=" + encodeURIComponent(JSON.stringify(dataParameter));
    });
    </script>
</div>
@endsection
