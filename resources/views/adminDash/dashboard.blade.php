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

            <a href="/addbooks" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-plus fa-5x" aria-hidden="true"></i></br>
                <p>Add / Edit Books</br> In Database</p>
            </a>

            <a href="/ordermonitoring" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-database fa-5x" aria-hidden="true"></i></br>
                <p>View / Deliver</br>Orders</p>
            </a>
        </div>
    </div>
</div>

@endsection
