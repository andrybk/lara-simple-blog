<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //

    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];

    /**
     * @return BlogCategory
     *
     */
    public function parentCategory()
    {
        $result = $this->belongsTo(BlogCategory::class, 'parent_id', 'id');

        return $result;
    }


    public function getParentTitleAttribute(){

        $parentC = $this->parentCategory;

        $title = $parentC->title
            ?? ($this->isRoot()
            ? 'Корень'
                //TODO: Make exception
            : '???');

        return $title;
    }

    public function isRoot(){
       $result =  $this->id === BlogCategory::ROOT;

       return $result;
    }
}
