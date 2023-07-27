<?php

namespace App\Repositories\Interfaces;

Interface VenueRepositoryInterfce{

    public function allVenue();
    public function storeVenue($data);
    public function findVenue($id);
    public function updateVenue($data, $id);
    public function destroyVenue($id);
}
