<?php

namespace App\Repository\Eloquent;

use App\Models\Zoo;
use App\Repository\Contracts\ZooRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use App\Repository\Filters\SearchNameFilter;
use App\Repository\Filters\SortFilter;

class ZooRepositoryEloquent extends AbstractRepository implements ZooRepository
{
    protected $filters = [
        'search_name'=>SearchNameFilter::class,
        'o'=>SortFilter::class,
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
    public function getSearchZooList(int $perPage = 0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }
}