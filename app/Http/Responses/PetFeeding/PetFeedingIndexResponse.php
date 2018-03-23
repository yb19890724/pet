<?php

namespace App\Http\Responses\PetFeeding;

use Illuminate\Contracts\Support\Responsable;
use App\Traits\ResponseTrait;

class PetFeedingIndexResponse implements Responsable
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
        $this->result->getCollection()->transform(function ($petFeeding) {
            return [
                'id' => $petFeeding->id,
                'unit' => $petFeeding->unit,
                'pet_name' => $this->typeName($petFeeding->feedingPet),
                'food_name' => $this->typeName($petFeeding->feedingFood),
                'food_category_name' => $this->typeName($petFeeding->feedingFoodCategory),
            ];
        });

        return $this->responseJson($this->result);
    }

    //宠物名称
    protected function typeName($relation)
    {
        return !empty($relation)?$relation->name:"";
    }
}