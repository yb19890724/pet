<?php

namespace App\Repository\Eloquent;

use App\Models\ZooFeeding;
use App\Repository\Contracts\ZooFeedingRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use App\Repository\Filters\ZooFilter;

class ZooFeedingRepositoryEloquent extends AbstractRepository implements ZooFeedingRepository
{
    protected $filters = [
        'zoo_id'=>ZooFilter::class
    ];

    public function entity()
    {
        return ZooFeeding::class;
    }

    /**
     * get zoo feedings paginate
     *
     */
    public function getZooFeedings(int $perPage=0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }
}