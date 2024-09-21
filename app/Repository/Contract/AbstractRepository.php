<?php
namespace App\Repository\Contract;

use Illuminate\Validation\ValidationException;
use App\Repository\Contract\InterfaceRepository;

class AbstractRepository implements InterfaceRepository
{
    protected $model;

    public function index(array $data = [])
    {
        try {
            return$data = $this->model->all();
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }

    public function store(array $data = [])
    {
        try {
            return $data = $this->model->create($data);
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }
    public function update(string $member, int $value,int $id){
        try {
            return $data = $this->model->where('id', $id)->update([$member => $value]);
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }

    public function delete(int $id)
    {
        try {
            return $data = $this->model->where('id', $id)->delete();
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }
}
