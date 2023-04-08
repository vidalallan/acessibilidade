<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProblemFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','min:3'],
            'appTitle' => ['required','min:3'],
            'idDevice' => 'required|not_in:0'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'O campo título é obrigatório',
            'title.min' => 'O campo título deve ter no mínino :min caracteres',
            'appTitle.required' => 'O campo nome do aplicativo é obrigatório',
            'appTitle.required' => 'O campo nome do aplicativo deve ter no mínimo :min caracteres',
            'idDevice.not_in' => 'Escolha um dispositivo'
        ];
    }
}
