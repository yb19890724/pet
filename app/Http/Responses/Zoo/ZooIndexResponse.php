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
        $this->result->getCollection()->transform(function ($zoo) {
            return [
                'id'           => $zoo->id,
                'name'         => $zoo->name,
                'sex_title'    => $zoo->sexTransform(),
                'color'        => $zoo->color,
                'state_title'  => $zoo->stateTransform(),
            ];
        });

        return $this->responseJson($this->result);
    }
}