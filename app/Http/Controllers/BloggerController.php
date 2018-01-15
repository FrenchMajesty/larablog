<?php

namespace App\Http\Controllers;

use Auth;
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
    	$user = User::first();
    	return view('site.about', compact('user'));
    }

    /**
     * Show the page to edit the blogger's account info.
     * @return \Illuminate\Http\Response 
     */
    public function edit()
    {
    	$user = Auth::user();
    	return view('panel.account', compact('user'));
    }

    /**
     * Handle a request to update the blogger's account info.
     * @param  Request $request 
     * @return \Illuminate\Http\Response           
     */
    public function update(Request $request)
    {
    	$this->validate($request, [
    		'firstname' => 'required|string|max:100',
    		'lastname' => 'required|string|max:100',
    		'email' => 'required|email|max:100',
    		'image' => 'required|string',
    		'location' => 'required|string|max:80',
    		'title' => 'required|string|max:100',
    		'biography' => 'required|string|min:20|max:10000',
    	]);

    	$user = User::find($request->user()->id);
    	$user->firstname = $request->firstname;
    	$user->lastname = $request->lastname;
    	$user->email = $request->email;
    	$user->picture = $request->image;
    	$user->location = $request->location;
    	$user->title = $request->title;
    	$user->biography = $request->biography;
    	$user->save();

    	return back()->with('status', 'Your account informations were successfully updated!');
    }

    /**
     * Handle a request to update the user's passsword
     * @param  Request $request 
     * @return \Illuminate\Http\Response           
     */
    public function passwordUpdate(Request $request)
    {
    	$this->validate($request, [
    		'password' => 'required|string|confirmed|min:6',
    	]);

    	$user = User::find($request->user()->id);
    	$user->password = bcrypt($request->password);
    	$user->save();

    	return back()->with('password-status', 'Your password was successfully updated!');
    }
}
