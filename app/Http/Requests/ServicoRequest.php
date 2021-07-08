<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicoRequest extends FormRequest
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
            'nome' => ['required', 'min:2', 'max:255'],
            'icone' => ['required', Rule::in(['twf-cleaning-1', 'twf-cleaning-2', 'twf-cleaning-3'])],
            'posicao' => ['required', 'integer'],
            'valor_minimo' => ['required', 'numeric'],
            'quantidade_horas' => ['required', 'integer'],
            'porcentagem' => ['required', 'integer'],
            'valor_quarto' => ['required', 'numeric'],
            'horas_quarto' => ['required', 'integer'],
            'valor_sala' => ['required', 'numeric'],
            'horas_sala' => ['required', 'integer'],
            'valor_banheiro' => ['required', 'numeric'],
            'horas_banheiro' => ['required', 'integer'],
            'valor_cozinha' => ['required', 'numeric'],
            'horas_cozinha' => ['required', 'integer'],
            'valor_quintal' => ['required', 'numeric'],
            'horas_quintal' => ['required', 'integer'],
            'valor_outros' => ['required', 'numeric'],
            'horas_outros' => ['required', 'integer']
        ];
    }
}
