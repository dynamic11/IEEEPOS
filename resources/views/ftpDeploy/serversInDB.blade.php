@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<h3>Servers in Database</h3>
        	<p>untill all orders are delivered do not delete any books</p>

            @foreach($serversInDatabase as $server)
                <b>{{$server->nickname}}</b></br>
                URL: ourdomain/webhook/{{$server->id}}</br>
		        <a href="editserver/{{$server->id}}"class="btn btn-primary">Edit</a>
		        @if($server->status=="active")
	                <form method="POST" action="/ChangeServerStatus">
			  			{!! csrf_field() !!}
			  			<input type="hidden" name="server_id" value="{{$server->id}}">
				        <button type="submit" class="btn btn-danger">Deactivate</button>
					</form>
				@else
				 	<form method="POST" action="/ChangeServerStatus">
			  			{!! csrf_field() !!}
			  			<input type="hidden" name="server_id" value="{{$server->id}}">
				        <button type="submit" class="btn btn-success">Activate</button>
					</form>
				@endif
				</br>
            @endforeach

            <h3>Add Server To Database</h3>
            <form method="POST" action="/serverlist">
  			{!! csrf_field() !!}
			<fieldset class="form-group">
				<label for="formGroupExampleInput">Nickname of Server</label>
				<input type="text" name= "nickname" class="form-control" placeholder="SPAC">
				<label for="formGroupExampleInput">Host</label>
				<input type="text" name= "host" class="form-control" placeholder="ieeespac.ca">
				<label for="formGroupExampleInput">Username</label>
				<input type="text" name= "username" class="form-control" placeholder="spacadmin">
				<label for="formGroupExampleInput">password</label>
				<input type="text" name= "password" class="form-control" placeholder="612gg45">
				<label for="formGroupExampleInput">github_secret</label>
				<input type="text" name= "github_secret" class="form-control" placeholder="coolkids">
			</fieldset>
	        <button type="submit" class="btn btn-primary">Add Server</button>
		</form>
        </div>
        
    </div>
</div>
@endsection