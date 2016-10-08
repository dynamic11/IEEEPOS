@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3>Edit Book In Database</h3>
            <form method="POST" action="/editserver/{{$serverToEdit->id}}">
                {{ method_field('PATCH')}}
                {!! csrf_field() !!}
			     <fieldset class="form-group">
                     <label for="formGroupExampleInput">Nickname of Server</label>
                     <input type="text" name= "nickname" class="form-control" value="{{$serverToEdit->nickname}}">
                     <label for="formGroupExampleInput">Host</label>
                     <input type="text" name= "host" class="form-control" value="{{$serverToEdit->host}}">
                     <label for="formGroupExampleInput">Username</label>
                     <input type="text" name= "username" class="form-control" value="{{$serverToEdit->username}}">
                     <label for="formGroupExampleInput">password</label>
                     <input type="text" name= "password" class="form-control" value="{{$serverToEdit->password}}">
                     <label for="formGroupExampleInput">github_secret</label>
                     <input type="text" name= "github_secret" class="form-control" value="{{$serverToEdit->github_secret}}">
			     </fieldset>
	        <button type="submit" class="btn btn-primary">Save server</button>
		</form>
        </div>
        
    </div>
</div>
@endsection