<?php
namespace App\Repositories\Interfaces;

Interface OrganizerrepositoryInterface{

    public function allOrganizer();
    public function storeOrganizer($data);
    public function findOrganizer($id);
    public function updateOrganizer($data, $id);
    public function destroyOrganizer($id);
}
