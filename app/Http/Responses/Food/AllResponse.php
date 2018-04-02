<?php

namespace App\Http\Responses\Food;

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
        $this->result->transform(function ($food) {
            return [
                'id'           => $food->id,
                'name'         => $food->name
            ];
        });

        return $this->responseJson($this->result);
    }
}