@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h3>Orders</h3>
            
                @foreach($orders as $orderedBook)
                    <div style="margin-bottom:20px";>
                        <p>{{$orderedBook[1]}}=====>{{$orderedBook[2]}}</p>
                        <form method="POST" action="/ordermonitoring">
                            {!! csrf_field() !!}
                            <fieldset class="form-group">
                                <label for="formGroupExampleInput">Number of books available to distribute</label>
                                <input type="text" name= "numberOfAvailableBooks" class="form-control" placeholder="Ex. 100">
                                <input type="hidden" name= "book_id" value="{{$orderedBook[0]}}">
                            </fieldset>
                            <button type="submit" class="btn btn-primary">Send Pick Up Emails</button>
                        </form>
                    </div>
                @endforeach
            

            <table class="table sortable ">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>customer_email</th>
                  <th>Book Name</th>
                  <th>Order Status</th>
                  <th>Code</th>
                  <th>Date Ordered</th>
                </tr>
              </thead>
              <tbody>

                @foreach($allPurchases as $order)
                    <tr>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_email}}</td>
                        <td>{{$order->book->book_name}}</td>
                        <td>{{$order->order_status}}</td>
                        <td>{{$order->order_code}}</td>
                        <td>{{$order->order_date}}</td>
                    </tr>
                @endforeach
                
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection