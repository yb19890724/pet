<?php

namespace App\Http\Responses\ZooGrowth;

use App\Traits\ResponseTrait;
use Illuminate\Contracts\Support\Responsable;

class ZooGrowthIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($zooGrowth) {
            return [
                'id'            => $zooGrowth->id,
                'weight'        => $zooGrowth->weight,
                'body_length'   => $zooGrowth->body_length,
                'created_at'    => $zooGrowth->createTime(),
            ];
        });

        return $this->responseJson($this->result);
    }
}