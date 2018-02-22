<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
class AdminHome extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }


	public function index(){
    $total_applications=Application::all()->count();
		
    return view('admin.home')->with(array(
        'total_applications'=>$total_applications,
    ));
	}

    public function test(){
        return view('admin.test');
    }
}
