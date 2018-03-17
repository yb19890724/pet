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
        $this->result->getCollection()->transform(function ($food) {
            return [
                'id'           => $food->id,
                'name'         => $food->name,
                'sort'         => $food->sort,
                'created_at'   => $food->createTime(),
                'updated_at'   => $food->updateTime(),
            ];
        });

        return $this->responseJson($this->result);
    }
}