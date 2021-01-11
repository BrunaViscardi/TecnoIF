<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class MudarSituacaoRequest extends FormRequest
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
            'situacao'=> 'required'

        ];
    }
    public function messages()
    {
        return[
            'situacao.required' => 'O campo situação é obrigatório.',

        ];
    }
}
