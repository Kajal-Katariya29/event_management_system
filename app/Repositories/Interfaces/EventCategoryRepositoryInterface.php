<?php
namespace App\Repositories\Interfaces;

Interface EventCategoryRepositoryInterface{

    public function allCategory();
    public function storeCategory($data);
    public function findCategory($id);
    public function updateCategory($data, $id);
    public function destroyCategory($id);
}
