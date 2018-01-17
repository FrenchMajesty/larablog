<?php

namespace App\Model\Content;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{	
	/**
	 * The attributes that are mass assignable
	 * @var array
	 */
    protected $fillable = ['name'];

    /**
     * Get all the images that have this tag
     */
    public function images()
    {
    	return $this->belongsToMany('App\Model\Image', 'image_tags');
    }

    /**
     * Get all the blog posts that have this tag
     */
    public function posts()
    {
    	return $this->belongsToMany('App\Model\Blog', 'post_tags','tag_id','post_id');
    }
}
