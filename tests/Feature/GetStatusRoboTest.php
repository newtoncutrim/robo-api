<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use App\Models\Robot;
use App\Services\RoboService;
use App\Repository\RoboRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetStatusRoboTest extends TestCase
{
    protected $roboService;
    protected $roboRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->roboRepository = Mockery::mock(RoboRepository::class);
        $this->roboService = new RoboService($this->roboRepository);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function test_get_status_robot(): void
    {
        $robot = Robot::first();
        $mockedRobot = (object)['id' => $robot->id, 'left_elbow_id' => 0];

        $this->roboRepository->shouldReceive('findById')
            ->with($robot->id)
            ->once()
            ->andReturn($mockedRobot);

        $result = $this->roboService->getStatus($robot->id);

        $this->assertTrue($result['status']);
        $this->assertEquals($mockedRobot, $result['data']);
    }
}
