<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function addedVendor()
    {
        return view('backend.vendor.added');
    }
    public function storeVendor (Request $request)
    {
        $vendor = new Vendor;

        $vendor->b_name = $request->b_name;
        $vendor->o_name = $request->o_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->website = $request->website;
        $vendor->social_m = $request->social_m;
        
        if (isset($request->logo)){
            $imageName = rand().'-vendor-logo-'.'.'.$request->logo->extension();
            $request->logo->MOVE('backend/images/vendorlogo/', $imageName);

            $vendor->logo = $imageName;
        }

        $vendor->save();
        toastr()->success('Vendor Added Successfully!');
        return redirect()->back();
    }
    public function showVendor ()
    {
        $vendors = Vendor::get();
        return view('backend.vendor.list', compact('vendors'));
    }
    public function editVendor ($id)
    {
        $vendor = Vendor::find($id);
        return view('backend.vendor.edit', compact('vendor'));
    }
    public function updateVendor (Request $request, $id)
    {
        $vendor = Vendor::find($id);

        $vendor->b_name = $request->b_name;
        $vendor->o_name = $request->o_name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->website = $request->website;
        $vendor->social_m = $request->social_m;
        
        if(isset($request->logo))
        {
            if($vendor->logo && file_exists('backend/images/vendorlogo/'.$vendor->logo)){
                unlink('backend/images/vendorlogo/'.$vendor->logo);
            }

            $imageName = rand().'-vendorupdate-'.'.'.$request->logo->extension();
            $request->logo->move('backend/images/vendorlogo/', $imageName);
            $vendor->logo = $imageName;
        }

        $vendor->save();
        toastr()->success('Vendor Update Successfully!');
        return redirect()->back();
    }
    public function deleteVendor ($id)
    {
        $vendor = Vendor::find($id);

        if($vendor->logo && file_exists('backend/images/vendorlogo/'.$vendor->logo)){
            unlink('backend/images/vendorlogo/'.$vendor->logo);
        }

        $vendor->delete();
        toastr()->success('Vendor delete Successfully!');
        return redirect()->back();
    }
}
