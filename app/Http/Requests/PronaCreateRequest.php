<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PronaCreateRequest extends FormRequest
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
            'prona_cats_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'title' => 'required',
            'lloji' => 'required',
            'pershkrimi' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'rruga' => 'required',
            'sip'   => 'required',
            'price'    => 'required'
        ];
    }
}
