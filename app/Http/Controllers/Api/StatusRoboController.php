<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RoboService;
use App\Http\Controllers\Controller;

class StatusRoboController extends Controller
{
    protected $service;
    public function __construct(RoboService $service)
    {
        $this->service = $service;
    }

    public function getStatus(Request $request){

        $response = $this->service->getStatus();
        if(!$response['status']){
            return response()->json($response, 200);
        }
        return response()->json($response, 400);
    }
}
