<?php

namespace App\Http\Requests\Pet;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'           =>'required',
            'pet_box_id'     =>'required',
            'sex'            =>'required',
            'status'         =>'required',
            'color'          =>'required',
            'dominant_gene'  =>'required',
            'recessive_gene' =>'required',
            'sort'           =>'required',
            'birthday'       =>'required',
        ];
    }
}
