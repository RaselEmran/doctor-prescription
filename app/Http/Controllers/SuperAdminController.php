<?php

namespace App\Http\Controllers;
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
       public function logout()
    {
    	Session::flush();
    	return Redirect::to('/admin')->with('log','Logout Successfully');
    }
}
