<?php

namespace App\Repository\Eloquent;

use App\Models\ZooGrowth;
use App\Repository\Contracts\ZooGrowthRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;

class ZooGrowthRepositoryEloquent extends AbstractRepository implements ZooGrowthRepository
{
    protected $filters = [
        // filter and sort settings
    ];

    public function entity()
    {
        return ZooGrowth::class;
    }
}