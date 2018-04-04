<?php

namespace App\Repository\Eloquent;

use App\Models\Food;
use App\Repository\Contracts\FoodRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use App\Repository\Filters\SearchNameFilter;
use App\Repository\Filters\SortFilter;

class FoodRepositoryEloquent extends AbstractRepository implements FoodRepository
{
    protected $filters = [
        'search_name' => SearchNameFilter::class,
        'o' => SortFilter::class,
    ];

    public function entity()
    {
        return Food::class;
    }

    /**
     * Get Search Food list and paginate.
     *
     * @param int $perPage
     * @return mixed
     */
    public function searchFoods(int $perPage = 0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }

    /**
     * Get Food All.
     *
     * @return mixed
     */
    public function getFoodsAll()
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->get();
    }
}