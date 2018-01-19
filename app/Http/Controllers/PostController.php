<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/**
     * Show the blog index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        $user = User::first();
        return view('site.index', compact('blogs','user'));
    }
    
    /**
     * Show the page to manage blog post publications.
     * @return \Illuminate\Http\Response 
     */
    public function manager()
    {
    	$posts = Blog::orderBy('created_at','DESC')->paginate(15);
    	return view('panel.post', compact('posts'));
    }
}
