<?php

namespace App\Http\Responses\Pet;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class PetShowResponse implements Responsable
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
        return $this->responseJson($this->result);
    }
}