<?php

namespace App\Repository\Eloquent;

use App\Models\Gene;
use App\Repository\Contracts\GeneRepository;
use Phpno1\Architecture\Eloquent\AbstractRepository;
use App\Repository\Filters\GeneTypeFilter;
use Phpno1\Architecture\Criterias\FilterRequest;

class GeneRepositoryEloquent extends AbstractRepository implements GeneRepository
{
    protected $filters = [
       'gene_type'=>GeneTypeFilter::class
    ];

    public function entity()
    {
        return Gene::class;
    }

    /**
     * Get gene all .
     *
     * @return mixed
     */
    public function getGeneAll()
    {
        return $this->withCriteria(
            new FilterRequest($this->filters)
        )->select(['name'])->get();
    }
}