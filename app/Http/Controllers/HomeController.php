<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Following;

class HomeController extends Controller
{
	public static function cmp($a, $b)
	{
		return $a->created_at >= $b->created_at;
	}

    public function index()
    {
    	$result = [];
        $followings = Following::take(5)->get();
        foreach($followings as $following) {
            $tweets = \Twitter::getUserTimeline(['screen_name' => $following->screen_name, 'count' => 5, 'format' => 'object']);
            foreach($tweets as $tweet) {
            	// dd($tweet->created_at);
                array_push($result, $tweet);
            }
        }
        usort($result, 'App\Http\Controllers\HomeController::cmp');
        dd($result);
        // return view('home', compact('result'));
    }

    }
