<?php

namespace App\Repository\Eloquent;

use App\Models\PetFeeding;
use App\Repository\Contracts\PetFeedingRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use App\Repository\Filters\PetFilter;

class PetFeedingRepositoryEloquent extends AbstractRepository implements PetFeedingRepository
{
    protected $filters = [
        'pet_id'=>PetFilter::class
    ];

    public function entity()
    {
        return PetFeeding::class;
    }

    /**
     * get pet feedings paginate
     *
     */
    public function getPetFeedings(int $perPage=0)
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }
}