<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AddMovementsForRobot;
use App\Http\Requests\AddMovementRequest;

class AddMovementsRobot extends Controller
{

    protected $addCommandsForRobotService;
    public function __construct(AddMovementsForRobot $addCommandsForRobotService)
    {
        $this->addCommandsForRobotService = $addCommandsForRobotService;
    }

    public function addMovementsWrist(AddMovementRequest $request)
    {
        $data = $this->addCommandsForRobotService->addWristMoviment($request->all());
        if ($data['status']) {
            return response()->json($data['message'], 200);
        } else {
            return response()->json($data['message'], 400);
        }
    }

    public function addMovementsArm(AddMovementRequest $request)
    {
        $data = $this->addCommandsForRobotService->addArmMoviment($request->all());
        if ($data['status']) {
            return response()->json($data['message'], 200);
        } else {
            return response()->json($data['message'], 400);
        }
    }

    public function addMovementsHeadTilt(AddMovementRequest $request)
    {
        $data = $this->addCommandsForRobotService->addHeadTiltMoviment($request->all());
        if ($data['status']) {
            return response()->json($data['message'], 200);
        } else {
            return response()->json($data['message'], 400);
        }
    }

    public function addMovementsHeadRotation(AddMovementRequest $request)
    {
        $data = $this->addCommandsForRobotService->addHeadRotationMoviment($request->all());
        if ($data['status']) {
            return response()->json($data['message'], 200);
        } else {
            return response()->json($data['message'], 400);
        }
    }
}
