<?php

namespace App\Repository\Eloquent;

use App\Models\ZooGrowth;
use App\Repository\Contracts\ZooGrowthRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use App\Repository\Filters\ZooFilter;

class ZooGrowthRepositoryEloquent extends AbstractRepository implements ZooGrowthRepository
{
    protected $filters = [
        'zoo_id'=>ZooFilter::class
    ];

    public function entity()
    {
        return ZooGrowth::class;
    }

    /**
     * Get Zoo growths and paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getZooGrowths(int $perPage = 0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }
}