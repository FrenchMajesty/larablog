<?php

namespace App\Model\Content;

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
    	return $this->hasMany('App\Model\Image');
    }

    /**
     * Get all the blog posts that have this tag
     */
    public function posts()
    {
    	return $this->hasMany('App\Model\Blog');
    }
}
