<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MagazinaCreateRequest extends FormRequest
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
            'magazina_cats_id' => 'required',
            'title' => 'required',
            'pershkrimi' => 'required',
            'publikuesi' => 'required'
        ];
    }
}
