<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Server;

class ServersInDBController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
	public function addServersToDatabase(Request $request)
    {
    	$newServer = new Server;
    	$newServer->nickname=$request->nickname;
    	$newServer->host=$request->host;
    	$newServer->username=$request->username;
        $newServer->password=$request->password;
        $newServer->github_secret=$request->github_secret;
        $newServer->status="active";
	    $newServer->save();
        return Redirect('/serverlist');
    }

    public function showServersInDatabase()
    {
    	$serversInDatabase= Server::all();
        return view('ftpDeploy.serversInDB',compact('serversInDatabase'));
    }

    public function ChangeServerStatus(Request $request)
	{
	    $serverToDeactivate = Server::findOrFail($request->server_id);
	    if($serverToDeactivate->status=="active"){
	    	$serverToDeactivate->status="deactivated";
	    }else{
	    	$serverToDeactivate->status="active";
	    }
	    
	    $serverToDeactivate->save();
    	return Redirect('/serverlist');
	}

    public function editFormServersInDatabase(Server $serverToEdit)
    {
        return view('ftpDeploy.editServersInDB',compact('serverToEdit'));
    }

    public function editServersInDatabase(Request $request, Server $serverToEdit)
    {
    	$server = Server::find($serverToEdit->id);
		$server->nickname=$request->nickname;
        $server->host=$request->host;
        $server->username=$request->username;
        $server->password=$request->password;
        $server->github_secret=$request->github_secret;
		$server->save();

        return Redirect('/serverlist');
    }

}
