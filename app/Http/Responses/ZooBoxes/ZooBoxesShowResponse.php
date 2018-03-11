<?php

namespace App\Http\Responses\ZooBoxes;

use Illuminate\Contracts\Support\Responsable;

class ZooBoxesShowResponse implements Responsable
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