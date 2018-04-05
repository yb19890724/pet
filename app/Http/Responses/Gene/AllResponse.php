<?php

namespace App\Http\Responses\Gene;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class AllResponse implements Responsable
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
            return [
                 'value'    => $gene->id,
                 'label'    => $gene->name
            ];
        });
        return $this->responseJson($this->result);
    }
}