<?php
namespace App\Repository\Contract;

use App\Repository\Contract\InterfaceRepository;

class AbstractRepository implements InterfaceRepository
{
    protected $model;

    public function getStatus(){

    }

    public function moveElbow(string $side, int $slope){

    }

    public function moveWrist(string $side, int $rotation){

    }

    public function moveHead(string $side, int $rotation){

    }
}
