<?php

namespace App\Http\Requests\PetGrowth;

use App\Http\Requests\PetGrowth\StoreRequest;

class UpdateRequest extends StoreRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules();
    }
}
