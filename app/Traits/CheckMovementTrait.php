<?php

namespace App\Traits;

trait CheckMovementTrait
{
    public function checkMovement($current, $new, $member)
    {
        // Permite que o valor seja o mesmo, sem necessidade de incremento
        if ($current === $new) {
            return [
                'status' => true,
                'message' => 'O valor já é o mesmo, nenhum movimento será feito.'
            ];
        }
        // Verifica se o movimento é incremental de 1 (para frente ou para trás)
        if (abs($current - $new) !== 1) {
            return [
                'status' => false,
                'message' => "O movimento somente pode ser alterado em incrementos de 1 para frente ou para trás." . ' ' . $member
            ];
        }

        // Se todas as verificações passaram, retorna sucesso
        return [
            'status' => true,
            'message' => 'Movimento válido.'
        ];
    }
}
