<?php

namespace App\Repository\Eloquent;

use App\Models\PetBox;
use App\Repository\Filters\SortFilter;
use App\Repository\Contracts\PetBoxRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;

class PetBoxRepositoryEloquent extends AbstractRepository implements PetBoxRepository
{
    protected $filters = [
        'o' => SortFilter::class,
    ];

    public function entity()
    {
        return PetBox::class;
    }

    /**
     * Get pet boxes all .
     *
     * @return mixed
     */
    public function getPetBoxesAll()
    {
        return $this->entity->petBoxAll();
    }
}