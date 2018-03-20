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

    /**
     * Get zoo boxes all .
     *
     * @return mixed
     */
    public function getZooBoxesAll()
    {
        return $this->entity->select(['id as value','box_number as label'])->get();
    }
}