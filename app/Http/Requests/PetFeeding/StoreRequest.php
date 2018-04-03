<?php

namespace App\Http\Requests\PetFeeding;

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
            'pet_id'=>'required',
            'food_id'=>'required',
            'food_category_id'=>'required',
            'pet_box_id'=>'required',
            'unit'=>'required'
        ];
    }
}
