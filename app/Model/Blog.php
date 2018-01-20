<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{	
	/**
	 * The attributes that are mass assignable
	 * @var array
	 */
	protected $fillable = [
		'title',
		'description',
		'content',
		'category_id',
		'embed',
		'picture',
		'has_picture',
		'has_video',
	];

	/**
	 * The attributes who type should be casted to native types
	 * @var array
	 */
	protected $casts = [
		'has_picture' => 'boolean',
		'has_video' => 'boolean',
	];

	/**
	 * The attributes that should be mutated to dates
	 * @var array
	 */
	protected $dates = ['created_at','updated_at'];

	/**
	 * Get the category in which this blog post was submitted in
	 */
	public function category()
	{
		return $this->belongsTo('App\Model\Content\Category');
	}

	/**
     * Get the tags associated with this blog post
     */
    public function tags()
    {
        return $this->belongsToMany('App\Model\Content\Tag','post_tags','tag_id','post_id');
    }
}
