<?php

namespace App\Repositories;

use App\Models\Gallery;

use App\Repositories\Interfaces\GalleryRepositoryInterface;

class GalleryRepository implements GalleryRepositoryInterface
{
    public function getAll($perPage=20) 
    {
        return Gallery::paginate($perPage);
    }

    public function getById($orderId) 
    {
        return Gallery::findOrFail($orderId);
    }

    public function StoreUpdate($orderDetails, $id=0) 
    {
        return Gallery::create($orderDetails);
    }

    public function delete($orderId) 
    {
        Gallery::destroy($orderId);
    }
}