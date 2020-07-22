<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function showAddVendor()
    {
        return view('vendor.add_vendor');
    }

    public function allVendor()
    {
        $vendors = Vendor::all();
        return view('vendor.all_vendor', compact('vendors'));
    }

    public function storeVendor(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        $employees = new Vendor;
        $employees->name = $request->name;
        $employees->company_name = $request->company_name;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->website = $request->website;
        $employees->description = $request->description;
        $employees->save(); 

        return redirect()->back()->with('success','Vendor Added Successfully!');
    }

    public function editVendor($id)
    {
        $vendor = Vendor::find($id);
         return view('vendor.edit_vendor',compact('vendor'));
    }

    public function updateVendor(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        $employees = Vendor::find($id);
        $employees->name = $request->name;
        $employees->company_name = $request->company_name;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->website = $request->website;
        $employees->description = $request->description;
        $employees->save(); 

        return redirect()->route('allVendor')->with('success','Vendor Updated Successfully!');
    }
    public function deleteVendor($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->back()->with('danger','Vendor Deleted Successfully!');
    }
}
