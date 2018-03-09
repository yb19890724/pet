<?php

namespace App\Repository\Filters;

use Phpno1\Repository\Filters\{
    AbstractFilter,
    IOrder
};

class SortFilter extends AbstractFilter implements IOrder
{
    protected function mappings()
    {
        return [

        ];
    }

    public function filter($entity,$value)
    {
        return $entity;
    }

    public function order($entity, $direction)
    {
        return $entity->orderBy('sort', $this->resolveOrderDirection($direction));
    }
}