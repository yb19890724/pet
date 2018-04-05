<?php

namespace App\Http\Responses\PetBox;

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
        $this->result->transform(function ($petBox) {
            return [
                'value'           => $petBox->id,
                'label'           => $petBox->box_number
            ];
        });
        return $this->responseJson($this->result);
    }
}