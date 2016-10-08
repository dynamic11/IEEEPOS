<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Server;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class githubConnectionController extends Controller
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

	public function recieveWebhook(Request $request)
    {
    	$process = new Process('ls');
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result=$process->getOutput();
        return view('ftpDeploy.result',compact('result'));
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
