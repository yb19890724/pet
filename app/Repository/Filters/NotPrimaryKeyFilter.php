<?php

namespace App\Repository\Filters;

use Phpno1\Architecture\Filters\{
    AbstractFilter,
    IOrder
};

class NotPrimaryKeyFilter extends AbstractFilter 
{
    protected function mappings()
    {
        return [

        ];
    }

    public function filter($entity, $value)
    {
        return $entity->where('not_primary_key_filter', $value);
    }


}