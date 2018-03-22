<?php

namespace App\Http\Responses\ZooBox;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class ZooBoxAllResponse implements Responsable
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
        $this->result->transform(function ($zooBoxes) {
            return [
                'value'           => $zooBoxes->value,
                'label'           => $zooBoxes->label
            ];
        });
        return $this->responseJson($this->result);
    }
}