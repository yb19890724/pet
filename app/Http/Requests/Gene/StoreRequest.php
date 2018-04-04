<?php

namespace App\Http\Requests\Gene;

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
            'name'      =>  'required|min:1|max:10',
            'code'      =>  'required|min:1|max:10',
            'gene_type' =>  'required',
        ];
    }
}
