<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BannerRepositoryInterface;
use App\Models\Banner;

class BannerRepository implements BannerRepositoryInterface
{
    public function allBanner()
    {
        return Banner::orderby('banner_id','desc')->get();
    }

    public function storeBanner($data)
    {
        $bannerData = Banner::insertGetId([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        if(!empty($data['image']))
        {
            $image = $data['image'];
            $filename = $image->getClientOriginalName();
            $upload_path = "admin/images/banners/" . $bannerData . "/";
            $image->move($upload_path, $filename);
            Banner::where('banner_id',$bannerData)->update([
                'image' => $filename
            ]);
        }

        return $bannerData;
    }

    public function findBanner($id)
    {
        return Banner::find($id);
    }

    public function updateBanner($data, $id)
    {
        $bannerData = Banner::where('banner_id', $id)->first();

        if (!$bannerData) {
            return  null;
        }

        $bannerData->update([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        if (!empty($data['image'])) {
            $image = $data['image'];
            $filename = $image->getClientOriginalName();
            $upload_path = "admin/images/banners/" . $id . "/";
            $image->move($upload_path, $filename);
            $bannerData->update([
                'image' => $filename
            ]);
        }

        if (!empty($data['old_image']) && file_exists($upload_path . $data['old_image'])) {
            unlink($upload_path . $data['old_image']);
        }

        return $bannerData;
    }

    public function destroyBanner($id)
    {
        $banner = Banner::find($id);
        $deleteBanner = null;
        if($banner)
        {
            $deleteBanner = $banner->delete();
        }
        return $deleteBanner;
    }
}
