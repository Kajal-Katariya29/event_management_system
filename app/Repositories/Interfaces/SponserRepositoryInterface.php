<?php
namespace App\Repositories\Interfaces;

Interface SponserRepositoryInterface{

    public function allSponser();
    public function storeSponser($data);
    public function findSponser($id);
    public function updateSponser($data, $id);
    public function destroySponser($id);
}
