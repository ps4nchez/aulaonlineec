<?php

namespace aulaonline\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoFormRequest extends FormRequest
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
            'idaula'=>'required',
            'nombres'=>'required|max:100',
            'apellidos'=>'required|max:100',
            'codigo'=>'required|max:10',
            'celular'=>'required|max:10',
            'direccion'=>'required|max:100',
            'email'=>'required|max:100',
            'sexo'=>'required|max:1',
            'foto'=>'mimes:jpeg,bmp,png',
        ];
    }
}
