<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SliderBanner;
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

    //Sliders Banners.................................
    public function createSliders ()
    {
        return view('backend.slider.create');
    }
    public function storeSliders (Request $request)
    {
        $slider = new SliderBanner();

        $slider->title = $request->title;
        $slider->description = $request->description;
        if(isset($request->image))
        {
            $imageName = rand().'-slider-'.'.'.$request->image->extension();
            $request->image->move('backend/images/sliderBanner/', $imageName);
            $slider->image = $imageName;
        }
        $slider->save();
        return redirect()->back();
    }
    public function showSliders ()
    {
        $sliders = SliderBanner::get();
        return view('backend.slider.list', compact('sliders'));
    }
    public function editSliders ($id)
    {
        $slider = SliderBanner::find($id);
        return view('backend.slider.edit', compact('slider'));
    }
    public function updateSliders (Request $request, $id)
    {
        $slider = SliderBanner::find($id);

        $slider->title = $request->title;
        $slider->description = $request->description;
        if(isset($request->image))
        {
            if($slider->image && file_exists('backend/images/sliderBanner/'.$slider->image))
            {
                unlink('backend/images/sliderBanner/'.$slider->image);
            }

            $imageName = rand().'-sliderupdate-'.'.'.$request->image->extension();
            $request->image->move('backend/images/sliderBanner/', $imageName);
            $slider->image = $imageName;
        }
        
        $slider->save();
        return redirect('/admin/show-sliders');
    }
    public function deleteSliders ($id)
    {
        $slider = SliderBanner::find($id);

        if($slider->image && file_exists('backend/images/sliderBanner/'.$slider->image)){
            unlink('backend/images/sliderBanner/'.$slider->image);
        }
        $slider->delete();

        return redirect()->back();
    }
}
