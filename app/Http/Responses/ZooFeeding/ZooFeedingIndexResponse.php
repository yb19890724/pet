<?php

namespace App\Http\Responses\ZooFeeding;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class ZooFeedingIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($zooFeeding) {
            return [
                'id'            => $zooFeeding->id,
                'unit'          => $zooFeeding->unit,
            ];
        });

        return $this->responseJson($this->result);
    }
}