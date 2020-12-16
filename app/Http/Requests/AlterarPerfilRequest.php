<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class AlterarPerfilRequest extends FormRequest
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
            'email'=> 'email:rfc,dns',
            'campus'=> 'required',
            'conta'=> 'required',
            'agencia'=> 'required',
            'banco'=> 'required',
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
            'anexo.required'=> 'O campo anexo é obrigatório.',
            'conta.required' => 'O campo Conta  é obrigatório.',
            'agencia.required' => 'O campo Agência é obrigatório.',
            'banco.required' => 'O campo Banco é obrigatório.',
            'endereco.required' => 'O campo Endereço é obrigatório.',
            'nascimento.required' =>'O campo Data de Nascimento é obrigatório.'

        ];
    }
}
