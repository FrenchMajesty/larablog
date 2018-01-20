<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Content\Category;
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
        $blogs = Blog::orderBy('created_at','DESC')->paginate(10);
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

    /**
     * Show the page to add a new blog post publication.
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $categories = Category::all();
        return view('panel.post.add', compact('categories'));
    }

    /**
     * Handle the request to create a new blog post publication.
     * @param  Request $request 
     * @return \Illuminate\Http\Response           
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:120|unique:blogs',
            'description' => 'required|string|max:400',
            'type' => 'required|string|in:text,media,picture',
            'content' => 'required|string|max:20000',
            'category' => 'required|numeric|exists:categories,id',
            'tags' => 'required|string|max:100',
            'image' => 'required_if:type,picture|string',
            'embed' => 'required_if:type,media|string',
        ]);

        $post = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category,
        ]);

        if($request->type == 'picture') {
            $post->has_picture = true;
            $post->picture = $request->image;
            $post->save();
        }else if($request->type == 'media') {
            $post->has_video = true;
            $post->embed = $request->embed;
            $post->save();
        }

        return redirect()->route('panel.post')->with('status', 'Your publication was successfully created!');
    }
}
