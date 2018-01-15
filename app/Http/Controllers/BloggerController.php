<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class BloggerController extends Controller
{	
	/**
	 * Show the about page of the blogger.
	 * @return \Illuminate\Http\Response 
	 */
    public function index()
    {
    	return view('site.about');
    }

    /**
     * Show the page to edit the blogger's account info.
     * @return \Illuminate\Http\Response 
     */
    public function edit()
    {
    	# code...
    }

    /**
     * Handle a request to update the blogger's account info.
     * @param  Request $request 
     * @return \Illuminate\Http\Response           
     */
    public function update(Request $request)
    {
    	# code...
    }
}
