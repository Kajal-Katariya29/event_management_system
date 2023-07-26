<?php
namespace App\Repositories\Interfaces;

Interface BannerRepositoryInterface{

    public function allBanner();
    public function storeBanner($data);
    public function findBanner($id);
    public function updateBanner($data, $id);
    public function destroyBanner($id);
}
