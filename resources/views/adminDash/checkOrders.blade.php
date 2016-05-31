@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h3>Orders</h3>
            @foreach($orders as $orderedBook)
                <p>{{$orderedBook[0]}}=====>{{$orderedBook[1]}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection