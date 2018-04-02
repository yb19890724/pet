<?php

namespace App\Http\Responses\Food;

use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
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
        return [

        ];
    }
}