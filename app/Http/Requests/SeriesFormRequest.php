<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //como "true" todos estão autorizados a acessar esse request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'min:3', 'regex:[a-zA-Z.]'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Oxx tu já viu uma serie sem nome? 🤨',
            'nome.min' => 'Coloca um nome maior que :min caracteres ai! 😎',
            'nome.regex' => 'Opa é uma serie ou uma conta?'
        ];
    }
}
