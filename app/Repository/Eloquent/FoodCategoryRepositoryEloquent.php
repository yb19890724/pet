<?php

namespace App\Repository\Eloquent;

use App\Models\FoodCategory;
use App\Repository\Contracts\FoodCategoryRepository;
use Phpno1\Repository\Eloquent\AbstractRepository;
use App\Repository\Filters\SearchNameFilter;
use App\Repository\Filters\SortFilter;
use Phpno1\Repository\Criterias\FilterRequest;

class FoodCategoryRepositoryEloquent extends AbstractRepository implements FoodCategoryRepository
{
    protected $filters = [
        'search_name'=>SearchNameFilter::class,
        'o'=>SortFilter::class,
    ];

    public function entity()
    {
        return FoodCategory::class;
    }


    public function getSearchFoodCategoryList(int $perPage = 0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }
}