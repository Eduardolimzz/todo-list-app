<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determina se o usuário tem permissão para fazer esta solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        // Defina como `true` para permitir que todos os usuários possam fazer requisições de validação
        return true;
    }

    /**
     * Obtenha as regras de validação para a solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // O título é obrigatório, deve ter no máximo 255 caracteres
            'title' => 'required|max:255',

            // A descrição é opcional, então só validamos se for fornecida
            'description' => 'nullable|string',

            // O status é obrigatório e deve ser um dos valores definidos
            'status' => 'required|in:pending,completed',
        ];
    }

    /**
     * Obtenha as mensagens de erro personalizadas para as regras de validação.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'O título da tarefa é obrigatório.',
            'title.max' => 'O título da tarefa não pode ter mais que 255 caracteres.',
            'status.required' => 'O status da tarefa é obrigatório.',
            'status.in' => 'O status da tarefa deve ser "pending" ou "completed".',
            'description.string' => 'A descrição deve ser um texto válido.',
        ];
    }
}
