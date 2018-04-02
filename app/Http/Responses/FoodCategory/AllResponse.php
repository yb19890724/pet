<?php

namespace App\Http\Responses\FoodCategory;

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
        $this->result->transform(function ($foodCategory) {
            return [
                'id'           => $foodCategory->id,
                'name'         => $foodCategory->name
            ];
        });

        return $this->responseJson($this->result);
    }
}