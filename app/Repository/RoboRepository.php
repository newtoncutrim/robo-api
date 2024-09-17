<?php
namespace App\Repository;

use App\Models\Robo;
use App\Repository\Contract\AbstractRepository;

class RoboRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Robo();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }
}
