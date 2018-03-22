<?php

namespace App\Http\Responses\PetBox;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class PetBoxIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($petBox) {
            return [
                'id'           => $petBox->id,
                'box_number'   => $petBox->box_number,
                'sort'         => $petBox->sort,
                'created_at'   => $petBox->createTime(),
                'updated_at'   => $petBox->updateTime(),
            ];
        });
        return $this->responseJson($this->result);
    }
}