<?php

namespace App\Repository\Eloquent;

use App\Models\Pet;
use App\Repository\Contracts\PetRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use App\Repository\Filters\SearchNameFilter;
use App\Repository\Filters\SortFilter;
use App\Repository\Filters\SexFilter;

class PetRepositoryEloquent extends AbstractRepository implements PetRepository
{
    protected $filters = [
        'search_name' => SearchNameFilter::class,
        'sex' => SexFilter::class,
        'o' => SortFilter::class,
    ];

    public function entity()
    {
        return Zoo::class;
    }

    /**
     * Get Search zoo list and paginate.
     *
     * @param int $perPage
     * @return mixed
     */
    public function searchZoos(int $perPage = 0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }

    /**
     * Get zoo all .
     *
     * @return mixed
     */
    public function getZooAll()
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->select(['id as value','name as label'])->get();
    }
}