<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function createBanners ()
    {
        return view('backend.banner.create');
    }

    public function showBanners ()
    {
        $banners = Banner::get();
        return view('backend.banner.list', compact('banners'));
    }

    public function storeBanners (Request $request)
    {
        $banner = new Banner();
        if(isset($request->image))
        {
            $imageName = rand().'-banner-'.'.'.$request->image->extension();
            $request->image->move('backend/images/banner/', $imageName);
            $banner->image = $imageName;
        }
        $banner->save();
        return redirect()->back();
    }
    public function editBanners ($id)
    {
        $banner = Banner::find($id);
        return view('backend.banner.edit', compact('banner'));
    }
    public function updateBanners (Request $request, $id)
    {
        $banner = Banner::find($id);

        if(isset($request->image))
        {
            if($banner->image && file_exists('backend/images/banner/'.$banner->image))
            {
                unlink('backend/images/banner/'.$banner->image);
            }

            $imageName = rand().'-bannerupdate-'.'.'.$request->image->extension();
            $request->image->move('backend/images/banner/', $imageName);
            $banner->image = $imageName;
        }
        
        $banner->save();
        return redirect('admin/show-banners');
    }
    public function deleteBanners ($id)
    {
        $banner = Banner::find($id);

        if($banner->image && file_exists('backend/images/banner/'.$banner->image)){
            unlink('backend/images/banner/'.$banner->image);
        }
        $banner->delete();

        return redirect()->back();
    }
}
