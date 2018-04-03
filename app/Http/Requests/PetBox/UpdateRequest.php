<?php

namespace App\Http\Requests\PetBox;

use App\Http\Requests\PetBox\StoreRequest;

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
