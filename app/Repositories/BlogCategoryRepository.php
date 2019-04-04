<?php namespace App\Repositories;

use App\Models\BlogCategory as Model;

class BlogCategoryRepository extends CoreRepository
{


    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForSelect()
    {

        $columns = implode(', ', ['id', 'CONCAT (id, ". ", title) AS id_title',]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->get()
            ->toBase();

        return $result;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = implode(', ', ['id', 'title', 'parent_id']);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->paginate($perPage);

        return $result;
    }

    protected function getModelClass()
    {
        return Model::class;
        // TODO: Implement getModelClass() method.
    }


}
