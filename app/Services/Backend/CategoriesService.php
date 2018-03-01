<?php

namespace App\Services\Backend;

use Facades\App\Repositories\Backend\CategoriesRepository as Categories;

/* 商品分类服务层 */
class CategoriesService
{

    public function categories(array $params)
    {
        return Categories::categories($params);
    }


    public function categoriesCreate(array $params)
    {
        return Categories::categoriesCreate($params);
    }

    public function categoriesDestroy(array $params)
    {
        return Categories::categoriesDestroy($params);
    }

    public function categoriesUpdate(array $params)
    {
        return Categories::categoriesUpdate($params);
    }

}