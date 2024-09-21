<?php

namespace App\Helpers;

class StatusMessage
{
    public static function errorMessage($message)
    {
        return ['status' => false, 'message' => $message];
    }

    public static function successMessage($data = '')
    {
        return ['status' => true, 'message' => 'Robô movido com sucesso', 'data' => $data];
    }
}
