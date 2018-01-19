<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
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
}
