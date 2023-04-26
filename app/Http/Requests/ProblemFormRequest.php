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
            'title' => ['required_if:problemId,-1'],            
            'appTitle' => ['required','min:3'],
            'idDevice' => 'required|not_in:0',
            'problemId' => 'required|not_in:0',
            'patternId' => 'required|not_in:0'
            
        ];
    }

    public function messages(){
        return [
            'title.required_if' => 'O campo título é obrigatório quando for um novo problema',
            'problemId.not_in' => 'Escolha uma das opções de título para o problema',
            'patternId.not_in' => 'Escolha uma das opções para o guia de acessibilidade',
            'title.min' => 'O campo título deve ter no mínino 3 caracteres',
            'appTitle.required' => 'O campo nome do aplicativo é obrigatório',
            'appTitle.required' => 'O campo nome do aplicativo deve ter no mínimo 3 caracteres',
            'idDevice.not_in' => 'Escolha um dispositivo'            
            
        ];
    }
}
