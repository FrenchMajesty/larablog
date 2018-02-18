<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
	 * Create a cookie to change the default theme color
	 * @param  string $color The new theme color to set
	 * @return void        
	 */
    public function changeTheme(string $color)
    {
    	if($color != 'black' && $color != 'white') {
    		$color = 'black';
    	}

    	$cookie = cookie('theme-choice', $color, 0);
    	return redirect()->route('index')->cookie($cookie);
    }
}
