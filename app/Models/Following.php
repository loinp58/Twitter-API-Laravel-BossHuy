<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    protected $table = 'followings';

    protected $fillable = [
    	'id_twitter', 'screen_name'
    ];
}
