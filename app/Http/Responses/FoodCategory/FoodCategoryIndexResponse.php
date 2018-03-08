<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class FoodCategoryIndexResponse implements Responsable
{
    use ResponseTrait;
    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function toResponse($request)
    {
        $foodCategories = $this->transform();

        return $foodCategories;
    }

    protected function transform()
    {
        $this->result->getCollection()->transform(function ($foodCategory) {
            return [
                'id'           => $foodCategory->id,
                'name'         => $foodCategory->name,
                'created_at'   => $foodCategory->createTime(),
                'updated_at'   => $foodCategory->updateTime(),
            ];
        });

        return $this->responseJson($this->result);
    }
}