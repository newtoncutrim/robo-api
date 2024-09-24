<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RobotRequest extends FormRequest
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
            'left_elbow_id' => ['nullable', 'integer', 'between:0,4'],
            'right_elbow_id' => ['nullable', 'integer', 'between:0,4'],
            'left_wrist_id' => ['nullable', 'integer', 'between:0,7'],
            'right_wrist_id' => ['nullable', 'integer', 'between:0,7'],
            'head_rotation_id' => ['nullable', 'integer', 'between:0,5'],
            'head_tilt_id' => ['nullable', 'integer', 'between:1,3'],
        ];
    }

    public function messages(): array
    {
        return [
            'left_elbow_id.required' => 'O campo "Cotovelo Esquerdo" é obrigatório.',
            'left_elbow_id.integer' => 'O campo "Cotovelo Esquerdo" deve ser um número inteiro.',
            'left_elbow_id.between' => 'O valor do campo "Cotovelo Esquerdo" deve estar entre 0 e 4.',

            'right_elbow_id.required' => 'O campo "Cotovelo Direito" é obrigatório.',
            'right_elbow_id.integer' => 'O campo "Cotovelo Direito" deve ser um número inteiro.',
            'right_elbow_id.between' => 'O valor do campo "Cotovelo Direito" deve estar entre 0 e 4.',

            'left_wrist_id.required' => 'O campo "Pulso Esquerdo" é obrigatório.',
            'left_wrist_id.integer' => 'O campo "Pulso Esquerdo" deve ser um número inteiro.',
            'left_wrist_id.between' => 'O valor do campo "Pulso Esquerdo" deve estar entre 0 e 7.',

            'right_wrist_id.required' => 'O campo "Pulso Direito" é obrigatório.',
            'right_wrist_id.integer' => 'O campo "Pulso Direito" deve ser um número inteiro.',
            'right_wrist_id.between' => 'O valor do campo "Pulso Direito" deve estar entre 0 e 7.',

            'head_rotation_id.required' => 'O campo "Rotação da Cabeça" é obrigatório.',
            'head_rotation_id.integer' => 'O campo "Rotação da Cabeça" deve ser um número inteiro.',
            'head_rotation_id.between' => 'O valor do campo "Rotação da Cabeça" deve estar entre 0 e 5.',

            'head_tilt_id.required' => 'O campo "Inclinação da Cabeça" é obrigatório.',
            'head_tilt_id.integer' => 'O campo "Inclinação da Cabeça" deve ser um número inteiro.',
            'head_tilt_id.between' => 'O valor do campo "Inclinação da Cabeça" deve estar entre 1 e 3.',

        ];
    }
}
