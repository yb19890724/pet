<?php

namespace App\Http\Requests\Food;

use App\Http\Requests\Food\StoreRequest;

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
