@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h3>Orders</h3>
            @foreach($orders as $orderedBook)
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
            @endforeach
        </div>
    </div>
</div>
@endsection