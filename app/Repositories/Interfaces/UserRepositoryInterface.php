<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface 
{
    public function getAll($perPage);
    public function getById($Id);
    public function StoreUpdate(array $data, $id);
    public function delete($orderId);
}