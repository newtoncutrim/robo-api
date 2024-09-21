<?php

namespace App\Http\Controllers\Api;

use App\Services\RoboService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RobotRequest;

class CommandsForRoboController extends Controller
{
    protected $service;
    public function __construct(RoboService $service)
    {
        $this->service = $service;
    }

    public function moveRobot(RobotRequest $request, $id)
    {
        $data = $this->service->moveRobotLimbs($request->all(), $id);
        if ($data['status']) {
            return response()->json($data['message'], 200);
        } else {
            return response()->json($data['message'], 400);
        }
    }
}
