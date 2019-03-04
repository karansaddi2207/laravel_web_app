<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin_controller extends Controller
{

	public function __construct()
	{
		$this->middleware('admin');
	}

    public function home()
    {
    	return view('admin.home');
    }
}
