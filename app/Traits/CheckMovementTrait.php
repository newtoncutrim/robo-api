<?php

namespace App\Traits;

trait CheckMovementTrait
{
    public function checkMovement($current, $new, $member)
    {
        if ($current === $new) {
            return [
                'status' => true,
                'message' => 'O valor já é o mesmo, nenhum movimento será feito.'
            ];
        }

        if (abs($current - $new) !== 1) {
            return [
                'status' => false,
                'message' => "O movimento somente pode ser alterado em incrementos de 1 para frente ou para trás." . ' ' . $member
            ];
        }

        return [
            'status' => true,
            'message' => 'Movimento válido.'
        ];
    }
}
