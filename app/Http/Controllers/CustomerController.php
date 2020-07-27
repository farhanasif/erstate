<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function showAddCustomer()
    {
        return view('customer.add_customer');
    }

    public function allCustomer()
    {
        $customers = Customer::all();
        return view('customer.all_customer', compact('customers'));
    }

    public function storeCustomer(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'father_spouse' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nid' => 'required',
            'permanent_address' => 'required',
        ]);

        $customers = new Customer;
        $customers->name = $request->name;
        $customers->father_spouse = $request->father_spouse;
        $customers->address = $request->address;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->nid = $request->nid;
        $customers->permanent_address = $request->permanent_address;
        $customers->save(); 

        return redirect()->back()->with('success','Customer Added Successfully!');
    }

    public function editCustomer($id)
    {
        $customer = Customer::find($id);
         return view('customer.edit_customer',compact('customer'));
    }

    public function updateCustomer(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'father_spouse' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nid' => 'required',
            'permanent_address' => 'required',
        ]);

        $customers = Customer::find($id);
        $customers->name = $request->name;
        $customers->father_spouse = $request->father_spouse;
        $customers->address = $request->address;
        $customers->phone = $request->phone;
        $customers->email = $request->email;
        $customers->nid = $request->nid;
        $customers->permanent_address = $request->permanent_address;
        $customers->save(); 

        return redirect()->route('allCustomer')->with('success','Customer Updated Successfully!');
    }
    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back()->with('danger','Customer Deleted Successfully!');
    }
}
