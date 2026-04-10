<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'leads_nome' => 'required',
            'leads_email' => 'required',
            'leads_whatsapp' => 'required',
            'leads_cpf' => 'required',
            'leads_prox_acao',
            'leads_prox_acao_data',
            'leads_prox_acao_hora',
        ];
    }
}
