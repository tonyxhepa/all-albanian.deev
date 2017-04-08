<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakinaCreateRequest extends FormRequest
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
            'car_make_id' => 'required',
            'car_model_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'title' => 'required',
            'pershkrimi' => 'required',
            'email'      => 'email',
            'phone'      => 'required',
            'viti'       => 'required',
            'karburanti' => 'required',
            'kamio'      => 'required',
            'dogana'     => 'required',
            'km'         => 'required',
            'price'      => 'required'
        ];
    }
}
