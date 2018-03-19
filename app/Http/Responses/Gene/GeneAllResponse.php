<?php

namespace App\Http\Responses\Gene;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class GeneAllResponse implements Responsable
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
        $this->result->transform(function ($gene) {
            return $gene->name;
        });
        return $this->responseJson($this->result);
    }
}