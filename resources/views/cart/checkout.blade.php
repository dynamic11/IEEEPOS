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
                <select name= "payment_type" class="form-control"  id="paymentOption">
                  <option value="">---Select---</option>
                  <option value="cash">Cash</option>
                  <option value="square">Square</option>
                </select>
                @if ($errors->has('payment_type')) <p class="help-block" style="color:red">{{ $errors->first('payment_type') }}</p> @endif
                <div class="checkbox" id="cashConfirm" style="display:none">
                    <label>
                      <input name= "confirm_payment" type="checkbox"> I have collected the money for this order
                    </label>
                    @if ($errors->has('confirm_payment')) <p class="help-block" style="color:red">{{ $errors->first('confirm_payment') }}</p> @endif
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary" id="cashButton" style="display:none"><i class="fa fa-money" aria-hidden="true"></i> Pay With Cash</button>
            
            </form>
            <button type="submit" class="btn btn-primary" id="disabledButton" style="display:inline; background-color:grey">Please Select payment method</button>
            <button type="submit" class="btn btn-primary" id="squareButton" style="display:none"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Pay With Square</button>
        </div>
        

    </div>

    <script>

        $(document).ready(function(){
            $("#paymentOption").change(function () {
                var selectedPaymentMethod = $(this).val();
                if (selectedPaymentMethod == "cash") {
                    document.getElementById("disabledButton").style.display = "none"
                    document.getElementById("cashButton").style.display = "inline"
                    document.getElementById("squareButton").style.display = "none"
                    document.getElementById("cashConfirm").style.display = "inline"
                }else if(selectedPaymentMethod == "square"){
                    document.getElementById("disabledButton").style.display = "none"
                    document.getElementById("cashButton").style.display = "none"
                    document.getElementById("squareButton").style.display = "inline"
                    document.getElementById("cashConfirm").style.display = "none"
                }else{
                    document.getElementById("disabledButton").style.display = "inline"
                    document.getElementById("cashButton").style.display = "none"
                    document.getElementById("squareButton").style.display = "none"
                    document.getElementById("cashConfirm").style.display = "none"
                }
            });
        });

        document.getElementById("squareButton").addEventListener("click", function(){
            var dataParameter = {
                "amount_money": {
                  "amount" : "25",
                  "currency_code" : "CAD"
                },
                "callback_url" : "https://ieeecarletonvolunteer.xyz", // Replace this value with your application's callback URL
                "client_id" : "sq0idp-uPsZe4Id6AHglQEhpZwx3A", // Replace this value with your application's ID
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
