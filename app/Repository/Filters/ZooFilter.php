<?php

namespace App\Repository\Filters;

use Phpno1\Architecture\Filters\{
    AbstractFilter,
    IOrder
};

class ZooFilter extends AbstractFilter 
{
    protected function mappings()
    {
        return [

        ];
    }

    public function filter($entity, $value)
    {
        return $entity->where('zoo_id', $value);
    }


}