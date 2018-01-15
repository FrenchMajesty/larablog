<?php

namespace App\Http\Controllers;

use App\Model\Image;
use App\Model\Content\Tag;
use Illuminate\Http\Request;

class ImageController extends Controller
{	
	/**
	 * Show the gallery page
	 * @return \Illuminate\Http\Response 
	 */
    public function gallery()
    {
    	$images = Image::paginate(30);
    	$tags = Tag::all();
    	return view('site.gallery', compact('images', 'tags'));
    }
}
