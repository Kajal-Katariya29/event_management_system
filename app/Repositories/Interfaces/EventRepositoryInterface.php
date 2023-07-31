<?php
namespace App\Repositories\Interfaces;

Interface EventRepositoryInterface{

    public function allEvent();
    public function storeEvent($data);
    public function findEvent($id);
    public function updateEvent($data, $id);
    public function destroyEvent($id);
    public function deleteImage($id);
}
