<?php
namespace App\Services;

use App\Repository\RoboRepository;

class RoboService
{
    protected $repository;
    public function __construct(RoboRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getStatus()
    {
        //
    }
}
