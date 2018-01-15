<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{	
	/**
	 * Show the index page of the admin dashboard
	 * @return \Illuminate\Http\Response 
	 */
    public function index()
    {
    	return view('panel.index');
    }
}
