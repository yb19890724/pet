<?php

namespace App\Repositories\Backend;

use App\Repositories\BaseRepository;
use App\Models\Backend\CategoriesModel;
use Facades\App\Transformer\Backend\CategoriesTransform as Categories;

/* 商品分类仓库层 */
class CategoriesRepository extends BaseRepository
{
    public $bindModel = CategoriesModel::class;//绑定模型


    public function categories(array $params)
    {
        return $this->model->categories($params,'dictionaries');
    }

    public function categoriesCreate(array $params)
    {
        return $this->model->create($params);
    }


    public function categoriesDestroy(int $params)
    {
        return $this->model->destroy($params);
    }


    public function categoriesUpdate(array $params)
    {
        list($where,$attributes)=Categories::parameterCondition($params);
        return $this->model->conditionsUpdate($where,$attributes);
    }
}