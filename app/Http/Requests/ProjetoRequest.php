<?php

namespace App\Http\Requests;

use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
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
            'telefone'=> 'required|celular_com_ddd',
            'email'=> 'required|email:rfc,dns',
            'nome_projeto' =>'required',
            'campus' => 'required',
            'area' => 'required',
            'problemas'=> 'required',
            'caracteristicas' => 'required',
            'publico_alvo'=>'required',
            'dificuldades' => 'required',
            'disponibilidade' => 'required',
            'resultados' => 'required',
            'nomeMentor' => 'required',
            'instituicao' => 'required',
            'areaMentor' => 'required',

        ];
    }
    public function messages()
    {
        return[
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'nome_projeto.required' =>'O campo Nome do Projeto é obrigatório.',
            'campus.required' => 'O campo Campus é obrigatório.',
            'area.required' => 'O campo Área é obrigatório.',
            'problemas.required'=> 'Esse campo é obrigatório.',
            'caracteristicas.required' => 'Esse campo é obrigatório.',
            'publico_alvo.required'=>'Esse campo é obrigatório.',
            'dificuldades.required' => 'Esse campo é obrigatório.',
            'disponibilidade.required' => 'Esse campo é obrigatório.',
            'resultados.required' => 'Esse campo é obrigatório.',
            'nomeMentor.required' => 'Esse campo é obrigatório.',
            'instituicao.required' => 'Esse campo é obrigatório.',
            'areaMentor.required' => 'Esse campo é obrigatório.',
        ];
    }
}
