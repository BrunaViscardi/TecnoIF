<?php

namespace App\Http\Requests;
use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class GestorEditRequest extends FormRequest
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
            'email'=> 'required|email:rfc,dns',
            'senha'=> 'required|min:8',
            'campus'=> 'required'

        ];
    }
    public function messages()
    {
        return[
            'campus.required' => 'O campo Campus é obrigatório.',
            'nome.required' => 'O campo Nome é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'senha.required' =>'O campo senha é obrigatório.'

        ];
    }
}
