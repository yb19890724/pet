<?php

namespace App\Http\Responses\Zoo;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class ZooAllResponse implements Responsable
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
        $this->result->transform(function ($zoo) {
            return [
                'value'           => $zoo->value,
                'label'         => $zoo->label
            ];
        });
        return $this->responseJson($this->result);
    }
}