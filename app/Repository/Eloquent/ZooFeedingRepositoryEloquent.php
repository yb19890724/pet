<?php

namespace App\Repository\Eloquent;

use App\Models\ZooFeeding;
use App\Repository\Contracts\ZooFeedingRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;

class ZooFeedingRepositoryEloquent extends AbstractRepository implements ZooFeedingRepository
{
    protected $filters = [
        // filter and sort settings
    ];

    public function entity()
    {
        return ZooFeeding::class;
    }
}