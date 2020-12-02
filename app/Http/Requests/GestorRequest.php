<?php

namespace App\Http\Requests;
use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class GestorRequest extends FormRequest
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
            'nome' => ['required', new FullName],
            'email'=> 'required|email:rfc,dns|unique:users',
            'senha'=> 'required|min:8'

        ];
    }
    public function messages()
    {
        return[

            'nome.required' => 'O campo Nome é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'senha.required' =>'O campo senha é obrigatório.'

        ];
    }
}
