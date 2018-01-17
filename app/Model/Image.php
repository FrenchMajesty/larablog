<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{	
	/**
	 * The attributes that are mass assignable
	 * @var array
	 */
    protected $fillable = [
    	'url',
    	'title',
    	'category_id',
    ];

    /**
     * Get the category associated with this image
     */
    public function category()
    {
    	return $this->belongsTo('App\Model\Content\Category');
    }

    /**
     * Get the tags associated with this image
     */
    public function tags()
    {
        return $this->belongsToMany('App\Model\Content\Tag','image_tags');
    }
}
