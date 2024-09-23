<?php

namespace App\Helpers;

class StatusMessage
{
    public static function errorMessage($message)
    {
        return ['status' => false, 'message' => $message];
    }

    public static function successMessage($message, $data = '')
    {
        return ['status' => true, 'message' => $message, 'data' => $data];
    }
}
