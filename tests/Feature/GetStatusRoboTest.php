<?php

namespace Tests\Feature;

use App\Models\Robot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetStatusRoboTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_status_robot(): void
    {
        $robot = Robot::first();
        $response = $this->get("/api/get-status/robot/{$robot->id}");

        $response->assertStatus(200);
    }
}
