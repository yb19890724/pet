<?php

namespace App\Repository\Eloquent;

use App\Models\PetFeeding;
use App\Repository\Contracts\PetFeedingRepository;
use Phpno1\Architecture\Criterias\FilterRequest;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use App\Repository\Filters\PetFilter;
use Phpno1\Architecture\Criterias\EagerLoad;

class PetFeedingRepositoryEloquent extends AbstractRepository implements PetFeedingRepository
{
    protected $filters = [
        'pet_id'=>PetFilter::class
    ];

    protected $relations=[
        'feedingPet','feedingFood','feedingFoodCategory'
    ];

    public function entity()
    {
        return PetFeeding::class;
    }

    /**
     * get pet feedings paginate
     * @param int $perPage
     * @return mixed
     */
    public function getPetFeedings(int $perPage=0)
    {
        return $this->petFeedingsFields()->withCriteria(
            new FilterRequest($this->filters),
            new EagerLoad($this->relations)
        )->paginate($perPage);
    }



}