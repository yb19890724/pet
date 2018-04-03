<?php

namespace App\Http\Requests\Pet;

use App\Http\Requests\PetFeeding\StoreRequest;

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
