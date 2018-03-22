<?php

namespace App\Repository\Filters;

use Phpno1\Architecture\Filters\{
    AbstractFilter,
    IOrder
};

class PetFilter extends AbstractFilter
{
    protected function mappings()
    {
        return [

        ];
    }

    public function filter($entity, $value)
    {
        return $entity->where('pet_id', $value);
    }


}