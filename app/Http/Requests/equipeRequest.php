<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class equipeRequest extends FormRequest
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
            'cpf'=> 'required|formato_cpf',
            'telefone'=> 'required|celular_com_ddd',
            'rg'=> 'required',
            'email'=> 'required|email:rfc,dns|unique:users',
            'campus'=> 'required',
            'endereco'=> 'required',
            'nascimento'=> 'required',


        ];
    }
    public function messages()
    {
        return[

            'nome.required' => 'O campo Nome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'rg.required' => 'O campo RG é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'campus.required' => 'O campo Campus é obrigatório.',
            'endereco.required' => 'O campo Endereço é obrigatório.',
            'nascimento.required' =>'O campo Data de Nascimento é obrigatório.'

        ];
    }
}
