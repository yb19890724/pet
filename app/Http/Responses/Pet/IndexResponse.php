<?php

namespace App\Http\Responses\Pet;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class IndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($pet) {
            return [
                'id'           => $pet->id,
                'name'         => $pet->name,
                'sex_title'    => $pet->sexTransform(),
                'color'        => $pet->color,
                'status_title'  => $pet->statusTransform(),
            ];
        });

        return $this->responseJson($this->result);
    }
}