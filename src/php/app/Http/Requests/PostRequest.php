<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'titulo' => 'required|min:5',
            'contenido' => 'required|min:50'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El :attribute es obligatorio',
            'min' => 'El :attribute debe tener :min caracteres',
        ];
    }
}
