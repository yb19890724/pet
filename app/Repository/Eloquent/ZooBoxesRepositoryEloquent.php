<?php

namespace App\Repository\Eloquent;

use App\Models\ZooBoxes;
use App\Repository\Contracts\ZooBoxesRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;

class ZooBoxesRepositoryEloquent extends AbstractRepository implements ZooBoxesRepository
{
    protected $filters = [
        // filter and sort settings
    ];

    public function entity()
    {
        return ZooBoxes::class;
    }
}