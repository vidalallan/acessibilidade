<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeverityLevelRequest extends FormRequest
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
            'severityId' => 'required|not_in:0'
        ];
    }

    public function messages(){
        return [            
            'severityId.not_in' => 'Escolha um Nível de Criticidade'                        
        ];
    }
}


//php artisan make:request SeverityLevelRequest