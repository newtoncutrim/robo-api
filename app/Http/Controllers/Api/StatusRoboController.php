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

    public function getStatus(Request $request, $id){

        $response = $this->service->getStatus($id);
        if($response['status']){
            return response()->json($response['data'], 200);
        } else {
            return response()->json($response['data'], 400);
        }
    }
}
