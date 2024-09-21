<?php

namespace App\Repository;

use App\Models\HeadTiltMoviment;
use App\Repository\Contract\AbstractRepository;

class HeadTiltMovimentRepository extends AbstractRepository
{
    public function __construct(HeadTiltMoviment $headTiltMoviment)
    {
        $this->model = $headTiltMoviment;
    }
}
