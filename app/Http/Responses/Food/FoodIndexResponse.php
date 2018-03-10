<?php

namespace App\Http\Responses\Food;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class FoodIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($foodCategory) {
            return [
                'id'           => $foodCategory->id,
                'name'         => $foodCategory->name,
                'sort'         => $foodCategory->sort,
                'created_at'   => $foodCategory->createTime(),
                'updated_at'   => $foodCategory->updateTime(),
            ];
        });

        return $this->responseJson($this->result);
    }
}