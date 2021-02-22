<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateWorkRequest extends FormRequest
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
            'name' => 'required',
            'structure_id' => 'required',
            'unit_id' => 'required',
            'price' => 'nullable|regex:/^\d+(\.\d{1,6})?$/',
            'rate' => 'nullable|regex:/^\d+(\.\d{1,6})?$/',
            'quantity' => 'nullable|regex:/^\d+(\.\d{1,6})?$/'
        ];
    }


    public function messages()
    {
        return [
            'price.regex' => 'Price should be an integer or decimal',
            'rate.regex' => 'Rate should be an integer or decimal',
            'quantity.regex' => 'Quantity should be an integer or decimal'
        ];
    }
}
