<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

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

    public function customerData(){
        $customers = Customer::all();
        $data_table_render= DataTables::of($customers)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('customer/edit-customer/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteCustomer('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
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
        if ($customer){
            $customer->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
