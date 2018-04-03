<?php

namespace App\Http\Requests\PetGrowth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pet_id'        =>  'required',
            'weight'        =>  'required|digits_between:1,11',
            'body_length'   =>  'required|digits_between:1,11'
        ];
    }
}
