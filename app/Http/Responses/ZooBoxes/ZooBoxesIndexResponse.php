<?php

namespace App\Http\Responses\ZooBoxes;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class ZooBoxesIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($zooBoxes) {
            return [
                'id'           => $zooBoxes->id,
                'box_number'   => $zooBoxes->box_number,
                'sort'         => $zooBoxes->sort,
                'created_at'   => $zooBoxes->createTime(),
                'updated_at'   => $zooBoxes->updateTime(),
            ];
        });
        return $this->responseJson($this->result);
    }
}