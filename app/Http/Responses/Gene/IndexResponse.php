<?php

namespace App\Http\Responses\Gene;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class IndexResponse implements Responsable
{
    use ResponseTrait;

    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        $data = $this->transform();

        return $data;
    }

    protected function transform()
    {
        $this->result->getCollection()->transform(function ($gene) {
            return [
                'id'           => $gene->id,
                'name'         => $gene->name,
                'gene_type'    => $gene->geneTypeTransform(),
            ];
        });

        return $this->responseJson($this->result);
    }
}