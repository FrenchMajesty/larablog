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
}
