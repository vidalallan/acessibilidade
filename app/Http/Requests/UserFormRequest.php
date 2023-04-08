<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => ['required','min:2'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','min:6'],
            'confirm_password' => ['required','min:6']
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter no mínino :min caracteres',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.unique' => 'E-mail já cadastrado',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha deve ter no mínino :min caracteres',
            'confirm_password.required' => 'O campo confirmar senha é obrigatório',
            'confirm_password.min' => 'O campo confirmar senha deve ter no mínino :min caracteres',
        ];
    }
}
