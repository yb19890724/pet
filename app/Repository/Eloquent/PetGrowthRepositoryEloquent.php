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
        'pet_id'=>PetFilter::class
    ];

    public function entity()
    {
        return PetGrowth::class;
    }

    /**
     * Get Pet growths and paginate.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPetGrowths(int $perPage = 0)
    {
        return $this->petGrowthFields()->withCriteria(
            new FilterRequest($this->filters)
        )->paginate($perPage);
    }
}