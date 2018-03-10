<?php

namespace App\Http\Responses\Zoo;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class ZooIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($foodCategory) {
            return [
                'id'           => $foodCategory->id,
                'name'         => $foodCategory->name,
                'sex_title'    => $foodCategory->sexTransform(),
                'color_title'  => $foodCategory->colorTransform(),
                'state_title'        => $foodCategory->stateTransform(),
            ];
        });

        return $this->responseJson($this->result);
    }
}