<?php
namespace App\Repository\Contract;

interface InterfaceRepository
{
    public function getStatus();

    public function moveElbow(string $side, int $slope);

    public function moveWrist(string $side, int $rotation);

    public function moveHead(string $side, int $rotation);

}
