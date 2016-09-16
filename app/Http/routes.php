<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 * get all user follow you and you follow. get id_twitter and screen_name
 */
Route::get('/user-following', 'FollowsController@getAllFollowings');

Route::get('/user-follower', 'FollowsController@getAllFollowers');

Route::get('/get-tweet-test', 'HomeController@index');

// example get tweet.
Route::get('/get-tweet', function()
{
    return Twitter::getUserTimeline(['screen_name' => 'LoiNguyenPhuc', 'count' => 5, 'format' => 'json']);
});


