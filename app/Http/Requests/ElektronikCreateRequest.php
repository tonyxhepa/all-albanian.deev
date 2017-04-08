<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElektronikCreateRequest extends FormRequest
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
            'elektronik_cats_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'title' => 'required',
            'pershkrimi' => 'required',
            'phone' => 'required',
            'email' => 'nullable',
            'kompania' => 'required',
            'price'    => 'required'
        ];
    }
}
