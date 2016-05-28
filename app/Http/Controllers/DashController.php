<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashController extends Controller
{
    public function showDashboard()
    {
        return view('adminDash.dashboard');
    }
}
