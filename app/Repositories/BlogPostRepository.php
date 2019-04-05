<?php namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
        // TODO: Implement getModelClass() method.
    }

    public function getAllWithPaginate($perPage = null){
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->toBase()
            ->paginate(($perPage == null) ? 25 : $perPage);

        $asd = 4;

        $asdd = $asd + '123';
        return $result;
    }

}
