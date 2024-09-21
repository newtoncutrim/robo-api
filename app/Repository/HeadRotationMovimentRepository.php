<?php

namespace App\Repository;

use App\Models\HeadRotationMoviment;
use App\Repository\Contract\AbstractRepository;

class HeadRotationMovimentRepository extends AbstractRepository
{
    public function __construct(HeadRotationMoviment $headRotationMoviment)
    {
        $this->model = $headRotationMoviment;
    }
}
