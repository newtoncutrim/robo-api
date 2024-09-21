<?php

namespace App\Repository;

use App\Models\ArmMoviment;
use App\Repository\Contract\AbstractRepository;

class ArmMovimentRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new ArmMoviment();
    }
}
