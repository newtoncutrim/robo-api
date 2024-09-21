<?php
namespace App\Repository;

use App\Models\Robot;
use Illuminate\Validation\ValidationException;
use App\Repository\Contract\AbstractRepository;

class RoboRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Robot();
    }

    public function findById($id)
    {
        try {

            $data = $this->model->with(
                'rightElbowMovement',
                'leftElbowMovement',
                'rightWristMovement',
                'leftWristMovement',
                'headRotationMovement',
                'headTiltMovement'
            )->where('id', $id)->first();

            return $data;
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }
}
