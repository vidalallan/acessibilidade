<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceFormRequest extends FormRequest
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
    public function rules(){
        return [            
            'device' => ['required','min:3']                            
        ];
    }

    public function messages(){
        return [
            'device.required' => 'O campo dispositivo é obrigatório',
            'device.min' => 'O campo dispositivo deve ter no mínino :min caracteres'        
        ];
    }
    
}