<?php
namespace App\Repository\Contract;

interface InterfaceRepository
{
    public function index(array $data = []);
    public function store(array $data = []);
    public function delete(int $id);
    public function update(string $member, int $value, int $id);
}
