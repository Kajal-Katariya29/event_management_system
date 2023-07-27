<?php
namespace App\Repositories\Interfaces;

Interface CityRepositoryInterface{

    public function allCity();
    public function storeCity($data);
    public function findCity($id);
    public function updateCity($data, $id);
    public function destroyCity($id);
}
