<?php

namespace App\Http\Controllers;

use CURL;
use Illuminate\Http\Request;

class AdminController extends Controller
{	
	/**
	 * Show the index page of the admin dashboard
	 * @return \Illuminate\Http\Response 
	 */
    public function index()
    {
    	$curl = new CURL;
    	$response = $curl->get('http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]=1');
    	$quote = json_decode($response->body)[0];
    	$posts = collect([]);
    	$archives = collect([]);

    	return view('panel.index', compact('quote', 'posts', 'archives'));
    }

    /**
     * Redirect the user to the admin dashboard
     * @return \Illuminate\Http\Response 
     */
    public function redirect()
    {
        return redirect()->route('panel.index');
    }
}
