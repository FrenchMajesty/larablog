<?php

namespace App\Http\Controllers;

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
        return view('site.index', compact('blogs'));
    }

    /**
     * Show the about blogger page
     * @return \Illimunate\Http\Response 
     */
    public function about()
    {
        return view('site.about');
    }
}
