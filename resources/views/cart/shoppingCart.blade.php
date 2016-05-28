@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul>
                @foreach($booksInCart as $book)
                    <li>Book{{$book->id}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
