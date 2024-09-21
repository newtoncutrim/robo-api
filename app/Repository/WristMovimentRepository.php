<?php

namespace App\Repository;
use App\Models\WristMoviment;
use App\Repository\Contract\AbstractRepository;

class WristMovimentRepository extends AbstractRepository
{
    public function __construct(WristMoviment $wristMoviment)
    {
        $this->model = $wristMoviment;
    }
}
