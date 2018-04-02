<?php

namespace App\Http\Responses\PetGrowth;

use App\Traits\ResponseTrait;
use Illuminate\Contracts\Support\Responsable;

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
        $this->result->getCollection()->transform(function ($petGrowth) {
            return [
                'id'            => $petGrowth->id,
                'weight'        => $petGrowth->weight,
                'body_length'   => $petGrowth->body_length,
                'created_at'    => $petGrowth->createTime(),
            ];
        });

        return $this->responseJson($this->result);
    }
}