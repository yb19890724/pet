<?php

namespace App\Repository\Eloquent;

use App\Models\ZooBox;
use App\Repository\Contracts\ZooBoxRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;

class ZooBoxRepositoryEloquent extends AbstractRepository implements ZooBoxRepository
{
    protected $filters = [
        // filter and sort settings
    ];

    public function entity()
    {
        return ZooBox::class;
    }
}