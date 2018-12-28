<?php

namespace aulaonline\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectorFormRequest extends FormRequest
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
            'iddirector'=>'',
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'cargo'=>'required|max:45',
            'celular'=>'required|max:10',
            'email'=>'required|max:55',         
            'foto'=>'mimes:jpeg,bmp,png',
            'idinstitucion'=>'required'
        ];
    }
}
