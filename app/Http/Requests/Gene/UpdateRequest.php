<?php

namespace App\Http\Requests\Gene;

use App\Http\Requests\Gene\StoreRequest;

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
