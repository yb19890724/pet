<?php

namespace App\Repository\Eloquent;

use App\Models\PetGrowth;
use App\Repository\Contracts\PetGrowthRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use App\Repository\Filters\PetFilter;

class PetGrowthRepositoryEloquent extends AbstractRepository implements PetGrowthRepository
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