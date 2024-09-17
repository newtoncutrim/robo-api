<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RoboService;
use App\Http\Controllers\Controller;

class CommandsForRoboController extends Controller
{
    public function __construct(RoboService $service)
    {

    }
}
