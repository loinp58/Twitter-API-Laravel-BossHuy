<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Follower;
use App\Models\Following;

class FollowsController extends Controller
{
	// private $user_screen = env('SCREEN_NAME_TEST');

    public function getAllFollowers()
    {
    	$followers = \Twitter::getFollowers(['screen_name' => env('SCREEN_NAME_TEST'), 'format' => 'object']);
    	while (1) {
    		foreach($followers->users as $user) {
	    		Follower::create([
	    			'id_twitter' => $user->id,
	    			'screen_name' => $user->screen_name
	    		]);
	    	}
	    	if ($followers->next_cursor == 0) break;
	    	$followers = \Twitter::getFollowers(['screen_name' => env('SCREEN_NAME_TEST'), 'cursor' => $followers->next_cursor, 'format' => 'object']);
    	}
    	return 'ok';
    }

    public function getAllFollowings()
    {
    	$followings = \Twitter::getFriends(['screen_name' => env('SCREEN_NAME_TEST'), 'format' => 'object']);
    	while (1) {
    		foreach($followings->users as $user) {
	    		Following::create([
	    			'id_twitter' => $user->id,
	    			'screen_name' => $user->screen_name
	    		]);
	    	}
	    	if ($followings->next_cursor == 0) break;
	    	$followings = \Twitter::getFriends(['screen_name' => env('SCREEN_NAME_TEST'), 'cursor' => $followings->next_cursor, 'format' => 'object']);
    	}
    	return 'ok';
    }
}
