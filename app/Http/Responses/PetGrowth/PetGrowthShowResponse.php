<?php

namespace App\Http\Responses\PetGrowth;

use Illuminate\Contracts\Support\Responsable;

class PetGrowthShowResponse implements Responsable
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