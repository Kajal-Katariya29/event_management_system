<?php
namespace App\Repositories\Interfaces;

Interface CountryRepositoryInterface{

    public function allCountry();
    public function storeCountry($data);
    public function findCountry($id);
    public function updateCountry($data, $id);
    public function destroyCountry($id);
}
