<?php

namespace App\Repositories;

use App\Models\EventCategory;
use App\Repositories\Interfaces\EventCategoryRepositoryInterface;

class EventCategoryRepository implements EventCategoryRepositoryInterface
{
    public function allCategory()
    {
        return EventCategory::orderby('event_category_id','desc')->get();
    }

    public function storeCategory($data)
    {
        return EventCategory::create($data);
    }

    public function findCategory($id)
    {
        return EventCategory::find($id);
    }

    public function updateCategory($data, $id)
    {
        $category = EventCategory::where('event_category_id', $id)->first();
        $updatedCategory = null;
        if($category)
        {
            $updatedCategory = $category->update($data);
        }
        return $updatedCategory;
    }

    public function destroyCategory($id)
    {
        $category = EventCategory::find($id);
        $deleteCategory = null;
        if($category)
        {
            $deleteCategory = $category->delete();
        }
        return $deleteCategory;
    }
}
