<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    //
    use SoftDeletes;

    protected $dateFormat = 'U';
    protected $dates = [

        'published_at',
    ];

    protected $casts = [
        'published_at' => 'd.M H:i',
    ];



}
