<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeverityLevelFormRequest extends FormRequest
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
            'severity' => 'required'
        ];
    }

    public function messages(){
        return [            
            'severity' => 'O campo nível de gravidade é obrigatório'                        
        ];
    }
}
