<?php

namespace App\Http\Responses\Gene;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class GeneIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($food) {
            return [
                'id'           => $food->id,
                'name'         => $food->name,
                'gene_type'         => $food->name,
            ];
        });

        return $this->responseJson($this->result);
    }
}