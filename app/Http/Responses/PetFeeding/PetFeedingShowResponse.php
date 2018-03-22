<?php

namespace App\Http\Responses\PetFeeding;

use Illuminate\Contracts\Support\Responsable;

class PetFeedingShowResponse implements Responsable
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