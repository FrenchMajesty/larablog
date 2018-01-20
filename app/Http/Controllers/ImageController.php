<?php

namespace App\Http\Controllers;

use App\Model\Image;
use App\Model\Content\Tag;
use App\Model\Content\Category;
use Illuminate\Http\Request;

class ImageController extends Controller
{	
	/**
	 * Show the gallery page.
	 * @return \Illuminate\Http\Response 
	 */
    public function gallery()
    {
    	$images = Image::orderBy('created_at','DESC')->paginate(30);
    	$tags = Tag::all();
    	return view('site.gallery', compact('images', 'tags'));
    }

    /**
     * Show the page to add a new image to the gallery.
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $categories = Category::all();
        return view('panel.gallery.add', compact('categories'));
    }

    /**
     * Show the page to edit the gallery.
     * @return \Illuminate\Http\Response 
     */
    public function manager()
    {
        $gallery = Image::orderBy('created_at','DESC')->paginate(10);
        return view('panel.gallery', compact('gallery'));
    }

    /**
     * Show the page to edit an image.
     * @param \App\Model\Image $content Image to edit
     * @return \Illuminate\Http\Response 
     */
    public function edit(Image $content)
    {
        $categories = Category::all();
        return view('panel.edit', compact('content', 'categories'));
    }

    /**
     * Handle the request to add an image to the gallery
     * @param  Request $request 
     * @return \Illuminate\Http\Response           
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|string',
            'title' => 'required|string|max:120',
            'tags' => 'required|string|max:100',
            'category' => 'required|numeric|exists:categories,id',
        ]);

        $image = Image::create([
            'title' => $request->title,
            'url' => $request->image,
            'category_id' => $request->category,
        ]);

        $tags = explode(',', trim($request->tags));
        Tag::setForImage($image->id, $tags);

        return redirect()->route('panel.gallery')->with('status', 'Your image was succesfully posted!');
    }

    /**
     * Handle the request to update an image
     * @param  Request $request 
     * @return \Illuminate\Http\Response           
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric|exists:images',
            'title' => 'required|string|max:120|unique:images',
            'tags' => 'required|string|max:100',
            'type' => 'required|in:post,image',
            'category' => 'required|numeric|exists:categories,id',
            'content' => 'required|string|max:10000',
            'description' => 'required|string|max:400',
        ]);

        $image = Image::find($request->id);
        $image->title = $request->title;
        $image->category_id = $request->category;
        $image->save();

        $tags = explode(',', trim($request->tags));
        Tag::setForImage($image->id, $tags);

        return back()->with('status', 'Your image was succesfully updated!');
    }

    /**
     * Handle the request to delete an image
     * @param  App\Model\Image  $image Image to delete
     * @return \Illuminate\Http\Response        
     */
    public function delete(Image $image)
    {
        $image->delete();
        return redirect()->route('panel.gallery')->with('status', 'Your image was successfully deleted!');
    }
}
