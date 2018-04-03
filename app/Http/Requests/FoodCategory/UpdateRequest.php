<?php

namespace App\Http\Requests\FoodCategory;

use App\Http\Requests\FoodCategory\StoreRequest;

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
