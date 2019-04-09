<?php namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{

    public function getEdit()
    {
        return $this->startConditions()->find($id);
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];


            ])
            ->paginate(($perPage == null) ? 25 : $perPage);


        return $result;
    }

    protected function getModelClass()
    {
        return Model::class;
        // TODO: Implement getModelClass() method.
    }

}
