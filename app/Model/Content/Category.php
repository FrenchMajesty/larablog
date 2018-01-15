<?php

namespace App\Model\Content;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{	
	/**
	 * The attributes that are mass assignable
	 * @var array
	 */
    protected $fillable = ['name'];

    /**
     * Get all the blog posts associated with this category
     */
    public function blogs()
    {
    	return $this->belongsTo('App\Model\Blog');
    }
}
