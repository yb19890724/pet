<?php

namespace App\Http\Requests\PetBox;

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
            'box_number' =>  'required|digits_between:1,6',
            'sort'       =>  'required|digits_between:1,11'
        ];
    }
}
