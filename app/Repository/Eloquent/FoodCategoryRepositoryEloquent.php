<?php

namespace App\Repository\Eloquent;

use App\Models\FoodCategory;
use App\Repository\Contracts\FoodCategoryRepository;
use Phpno1\Repository\Eloquent\AbstractRepository;

class FoodCategoryRepositoryEloquent extends AbstractRepository implements FoodCategoryRepository
{
    protected $filters = [
        // filter and sort settings
    ];

    public function entity()
    {
        return FoodCategory::class;
    }
}