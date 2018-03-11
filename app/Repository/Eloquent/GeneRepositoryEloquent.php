<?php

namespace App\Repository\Eloquent;

use App\Models\Gene;
use App\Repository\Contracts\GeneRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;

class GeneRepositoryEloquent extends AbstractRepository implements GeneRepository
{
    protected $filters = [
        // filter and sort settings
    ];

    public function entity()
    {
        return Gene::class;
    }
}