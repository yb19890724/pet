<?php

namespace App\Repository\Eloquent;

use App\Models\FoodCategory;
use App\Repository\Contracts\FoodCategoryRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use App\Repository\Filters\SearchNameFilter;
use App\Repository\Filters\SortFilter;
use Phpno1\Architecture\Criterias\FilterRequest;

class FoodCategoryRepositoryEloquent extends AbstractRepository implements FoodCategoryRepository
{
    protected $filters = [
        'search_name' => SearchNameFilter::class,
        'o' => SortFilter::class,
    ];

    public function entity()
    {
        return FoodCategory::class;
    }

    /**
     * Get Search FoodCategory list and paginate.
     *
     * @param int $perPage
     * @return mixed
     */
    public function searchFoodCategories(int $perPage = 0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }

    /**
     * Get FoodCategory all .
     *
     * @param int $perPage
     * @return mixed
     */
    public function getFoodCategoryAll()
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->all();
    }
}