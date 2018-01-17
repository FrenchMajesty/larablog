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

    /**
     * Update the tags associated with an image
     * @param int $imageID ID of the image
     * @param array $tags The new tags
     */
    public static function setForImage(int $imageID, array $tags)
    {
        $insertRows = [];

        foreach($tags as $name) {
            $tag = Tag::firstOrCreate(['name' => trim($name)]);
            if(strlen($name) > 2) $insertRows[] = ['tag_id' => $tag->id, 'image_id' => $imageID];
        }

        DB::table('image_tags')->where('image_id', $imageID)->delete();
        DB::table('image_tags')->insert($insertRows);
    }

    /**
     * Update the tags associated with a blog post
     * @param int $postID ID of the blog post
     * @param array $tags The new tags
     */
    public static function setForPost(int $postID, array $tags)
    {
        $insertRows = [];

        foreach($tags as $name) {
            $tag = Tag::findOrCreate(['name' => trim($name)]);
            if(strlen($name) > 2) $insertRows[] = ['tag_id' => $tag->id, 'post_id' => $postID];
        }

        DB::table('post_tags')->where('post_id', $postID)->delete();
        DB::table('post_tags')->insert($insertRows);
    }
}
