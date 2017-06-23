@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Orders</h3>           

            <table class="table sortable ">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>customer_email</th>
                  <th>Book Name</th>
                  <th>Order Status</th>
                  <th>Code</th>
                  <th>Date Ordered</th>
                  <th>Volunteer</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $delivered=0;
                $ordered =0;
                $available=0;
                $void=0;
                $color="white";
               ?>
                @foreach($allPurchases as $order)

                    @if($order->order_status=="delivered")
                      <?php $delivered++;
                        $color="palegreen"?>
                    @elseif($order->order_status=="ordered")
                      <?php $ordered++;
                       $color="red" ?>
                    @elseif($order->order_status=="available")
                      <?php $available++;
                       $color="orange" ?>
                    @elseif($order->order_status=="void")
                      <?php $void++;
                       $color="grey" ?>
                    @endif

                    <tr style="background-color: {{$color}}">
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_email}}</td>
                        <td>{{$order->book->book_name}}</td>
                        <td>{{$order->order_status}}</td>
                        <td>{{$order->order_code}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->volunteer_name}}</td>
                    </tr>


                @endforeach
                
              </tbody>
            </table>
            <b> Delivered: </b> {{$delivered}} </br>
            <b> Available: </b> {{$available}} </br>
            <b> Ordered: </b> {{$ordered}} </br>
            <b> Void: </b> {{$void}} </br>

        </div>
    </div>
</div>
@endsection