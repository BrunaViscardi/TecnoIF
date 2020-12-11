<?php

namespace App\Http\Requests;
use App\Rules\FullName;
use Illuminate\Foundation\Http\FormRequest;

class EdicaoSenhaRequest extends FormRequest
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
            //'senhaAtual'=> 'password:api',
            //'senha'=> 'confirmed|required|min:8',
        ];
    }
    public function messages()
    {
        return[


        ];
    }
}
