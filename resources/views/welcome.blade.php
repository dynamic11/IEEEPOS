@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{url('preorderbook')}}">Preorder TextBook</a></br>
            <a href="#"> Buy Others</a></br>
            <a href="{{url('pickup')}}"> Order PickUp/Status</a>
        </div>
    </div>
</div>
@endsection
