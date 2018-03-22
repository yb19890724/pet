<?php

namespace App\Http\Responses\Pet;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class PetAllResponse implements Responsable
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
        $this->result->transform(function ($pet) {
            return [
                'value'           => $pet->value,
                'label'         => $pet->label
            ];
        });
        return $this->responseJson($this->result);
    }
}