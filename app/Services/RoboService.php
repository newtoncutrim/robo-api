<?php
namespace App\Services;

use App\Helpers\StatusMessage;
use App\Repository\RoboRepository;
use App\Traits\CheckMovement;
use App\Traits\CheckMovementTrait;
use Illuminate\Validation\ValidationException;

class RoboService
{
    use CheckMovementTrait;

    protected $repository;

    public function __construct(RoboRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getStatus($id)
    {
        $data = $this->repository->findById($id);

        return empty($data) ? [
            'status' => false,
            'data' => 'Nenhum dado encontrado'
        ] : [
            'status' => true,
            'data' => $data
        ];
    }

    public function moveRobotLimbs($request, $id)
    {
        $robot = $this->repository->findById($id);
        if (empty($robot)) {
            return StatusMessage::errorMessage('Nenhum robo encontrado');
        }

        $response = [];
        foreach ($request as $key => $value) {
            switch ($key) {
                case 'right_elbow_id':
                    $response[] = $this->moveElbowRight($value, $robot);
                    break;
                case 'left_elbow_id':
                    $response[] = $this->moveElbowLeft($value, $robot);
                    break;
                case 'right_wrist_id':
                    $response[] = $this->moveWristRight($value, $robot);
                    break;
                case 'left_wrist_id':
                    $response[] = $this->moveWristLeft($value, $robot);
                    break;
                case 'head_tilt_id':
                    $response[] = $this->moveHeadTilt($value, $robot);
                    break;
                case 'head_rotation_id':
                    $response[] = $this->moveHeadRotation($value, $robot);
                    break;
            }
        }

        $hasError = false;
        $error = [];
        foreach ($response as $value) {
            if (!$value['status']){
                $hasError = true;
                $error['message'] = $value['message'];
            }
        }

        if (!$hasError) {
            return  StatusMessage::successMessage();
        } else {
            return StatusMessage::errorMessage('Ocorreu um erro ao mover o robô, ' . ' ' . $error['message']);
        }
    }

    public function moveElbowLeft($value, $robot)
    {
        $current = $robot->left_elbow_id;

        $check = $this->checkMovement($current, $value, 'Cotovelo esquerdo');

        if ($check['status']) {
            $this->repository->update('left_elbow_id', $value, $robot->id);
            return StatusMessage::successMessage();
        } else {
            return $check;
        }
    }

    public function moveElbowRight($value, $robot)
    {
        $current = $robot->right_elbow_id;

        $check = $this->checkMovement($current, $value, 'Cotovelo direito');

        if ($check['status']) {
            $this->repository->update('right_elbow_id', $value, $robot->id);
            return StatusMessage::successMessage();
        } else {
            return $check;
        }
    }

    public function moveWristLeft($value, $robot)
    {
        $current = $robot->left_wrist_id;

        if ($robot->leftElbowMovement->description != 'Fortemente Contraído') {
            return StatusMessage::errorMessage('O cotovelo esquerdo deve estar contraído para mover o pulso esquerdo');
        }

        $check = $this->checkMovement($current, $value, 'Pulso esquerdo');

        if ($check['status']) {
            $this->repository->update('left_wrist_id', $value, $robot->id);
            return StatusMessage::successMessage();
        } else {
            return $check;
        }
    }

    public function moveWristRight($value, $robot)
    {
        $current = $robot->right_wrist_id;

        if ($robot->rightElbowMovement->description != 'Fortemente Contraído') {
            return StatusMessage::errorMessage('O cotovelo direito deve estar contraído para mover o pulso direito');
        }

        $check = $this->checkMovement($current, $value, 'Pulso direito');

        if ($check['status']) {
            $this->repository->update('right_wrist_id', $value, $robot->id);
            return StatusMessage::successMessage();
        } else {
            return $check;
        }
    }

    public function moveHeadTilt($value, $robot)
    {
        $current = $robot->head_tilt_id;

        $check = $this->checkMovement($current, $value, 'Inclinação da cabeca');

        if ($check['status']) {
            $this->repository->update('head_tilt_id', $value, $robot->id);
            return StatusMessage::successMessage();
        } else {
            return $check;
        }

    }

    public function moveHeadRotation($value, $robot)
    {
        $current = $robot->head_rotation_id;

        if ($robot->headTiltMovement->description == 'Para Baixo'){
            return StatusMessage::errorMessage('A inclinação da cabeca deve estar para cima para mover a rotação da cabeca');
        }

        $check = $this->checkMovement($current, $value, 'Rotação da cabeca');

        if ($check['status']) {
            $this->repository->update('head_rotation_id', $value, $robot->id);
            return StatusMessage::successMessage();
        } else {
            return $check;
        }
    }
}
