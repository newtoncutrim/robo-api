<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMovementRequest extends FormRequest
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
            'description' => ['required', 'string', 'min:3'],
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'O campo description é obrigatório',
            'description.min' => 'O campo description deve ter pelo menos 3 caracteres',
            'descriprion.string' => 'O campo description deve ser uma string',
        ];
    }
}
