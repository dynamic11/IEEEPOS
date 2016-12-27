@extends('layouts.app')

<style>
.btn-sq-lg {
  width: 150px !important;
  height: 150px !important;
  padding-top: 30px !important;
  margin:10px;
}

.btn-sq-lg i{
  padding-bottom: 10px !important;
}

.btn-sq-lg p{
  line-height: 15px !important;
}

</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">

            <a href="{{url('preorderbook')}}" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-book fa-5x" aria-hidden="true"></i></br>
                <p>Preorder TextBook</p>
            </a>

            <a href="{{url('orderstatus')}}" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-search fa-5x" aria-hidden="true"></i></br>
                <p>Order Pick-up </br>& Status</p>
            </a>
        </div>
    </div>
</div>
@endsection
