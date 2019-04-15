<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 *
 * @package App\Models
 *
 * @property BlogCategory   $category
 * @property User           $user
 * @property string         $title
 * @property string         $slug
 * @property string         $content_html
 * @property string         $content_raw
 * @property string         $except
 * @property boolean        $is_published
 * @property string         $published_at
 *
 */


class BlogPost extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content_raw',
        'is_published',
        'published_at',
        'user_id'
    ];

    /**
     * Posts category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Author of post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }



}
