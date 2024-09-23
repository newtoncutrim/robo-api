<?php

namespace App\Services;

use App\Helpers\StatusMessage;
use App\Repository\WristMovimentRepository;
use App\Repository\ArmMovimentRepository;
use App\Repository\HeadTiltMovimentRepository;
use App\Repository\HeadRotationMovimentRepository;

class AddMovementsForRobot
{
    protected $armMovimentRepository;
    protected $headRotationMovimentRepository;
    protected $headTiltMovimentRepository;
    protected $wristMovimentRepository;

    public function __construct (
        ArmMovimentRepository $armMovimentRepository,
        HeadRotationMovimentRepository $headRotationMovimentRepository,
        HeadTiltMovimentRepository $headTiltMovimentRepository,
        WristMovimentRepository $wristMovimentRepository
        )
    {
        $this->armMovimentRepository = $armMovimentRepository;
        $this->headRotationMovimentRepository = $headRotationMovimentRepository;
        $this->headTiltMovimentRepository = $headTiltMovimentRepository;
        $this->wristMovimentRepository = $wristMovimentRepository;
    }

    public function addHeadRotationMoviment(array $data)
    {
        $data = $this->headRotationMovimentRepository->store($data);

        if (!$data){
            StatusMessage::errorMessage('Não foi possível adicionar o movimento');
        }

        return StatusMessage::successMessage('Movimento adicionado com sucesso', $data);

    }

    public function addHeadTiltMoviment(array $data)
    {
        $data = $this->headTiltMovimentRepository->store($data);

        if (!$data){
            StatusMessage::errorMessage('Não foi possível adicionar o movimento');
        }

        return StatusMessage::successMessage('Movimento adicionado com sucesso', $data);
    }

    public function addWristMoviment(array $data)
    {
        $data = $this->wristMovimentRepository->store($data);

        if (!$data){
            StatusMessage::errorMessage('Não foi possível adicionar o movimento');
        }

        return StatusMessage::successMessage('Movimento adicionado com sucesso', $data);
    }

    public function addArmMoviment(array $data)
    {
        $data = $this->armMovimentRepository->store($data);

        if (!$data){
            StatusMessage::errorMessage('Não foi possível adicionar o movimento');
        }

        return StatusMessage::successMessage('Movimento adicionado com sucesso', $data);
    }
}
