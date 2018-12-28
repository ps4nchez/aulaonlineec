<?php

namespace aulaonline\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitucionFormRequest extends FormRequest
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
            'nombre'=>'required',
            'provincia'=>'required',
            'canton'=>'required',
            'parroquia'=>'required',
            'direccion'=>'required',
            'codigo_postal'=>'required',
        ];
    }
}
