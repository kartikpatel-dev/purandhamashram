<?php

namespace App\Repositories\Interfaces;

interface GalleryRepositoryInterface
{
    public function getAll($perPage, $permission);
    public function getById($Id);
    public function store($data);
    public function update($data, $id);
    public function delete($id);
}
