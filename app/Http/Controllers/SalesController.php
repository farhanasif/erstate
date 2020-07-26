<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Project;
use App\Product;
use App\Employee;
use App\Customer;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function showAddSales()
    {
        $data['projects'] = Project::all();
        $data['products'] = Product::all();
        $data['employees'] = Employee::all();
        $data['customers'] = Customer::all();
        return view('sales.add_sales',$data);
    }

    public function allSales()
    {
        $data['sales'] = Sale::all();

        // $data['salesInformations'] = DB::select(
        //     "SELECT sales.*,
        // projects.id AS project_id, (projects.name) AS project_name , (projects.id) AS project_id, (projects.name) AS project_name,
        //  (organizations.id) AS organization_id, organizations.organization_name,
        //  thana.id AS thana_id, (thana.name) AS thana_name
        //  FROM donation_information
        //  LEFT JOIN districts ON donation_information.district_id = districts.id
        //  LEFT JOIN projects ON donation_information.project_id = projects.id
        //  LEFT JOIN organizations ON donation_information.organization_id = organizations.id
        //  LEFT JOIN thana ON donation_information.thana_id = thana.id WHERE donation_information.organization_id = $org_id"
        //      );

        return view('sales.all_sales',$data);
    }

    public function storeSales(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'customer_name' => 'required',
            'project_name' => 'required',
            'product_name' => 'required',
            'employee_name' => 'required',
            'customer_name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'amount_paid' => 'required',
            'amount_due' => 'required',
            'sales_date' => 'required',
        ]);

        $sales = new Sale;
        $sales->customer_name = $request->customer_name;
        $sales->project_id = $request->project_name;
        $sales->product_id = $request->product_name;
        $sales->employee_id = $request->employee_name;
        $sales->customer_id = $request->customer_id;
        $sales->description = $request->description;
        $sales->amount = $request->amount;
        $sales->amount_paid = $request->amount_paid;
        $sales->amount_due = $request->amount_due;
        $sales->sales_date = $request->sales_date;
        $sales->save(); 

        return redirect()->back()->with('success','Sales Added Successfully!');
    }

    public function editSales($id)
    {        
        $data['projects'] = Project::all();
        $data['products'] = Product::all();
        $data['employees'] = Employee::all();
        $data['customers'] = Customer::all();
        $data['sales'] = Sale::find($id);
         return view('sales.edit_sales',$data);
    }

    public function updateSales(Request $request, $id)
    {
        $this->validate($request,[
            'customer_name' => 'required',
            'project_name' => 'required',
            'product_name' => 'required',
            'employee_name' => 'required',
            'customer_name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'amount_paid' => 'required',
            'amount_due' => 'required',
            'sales_date' => 'required',
        ]);

        $sales = Sale::find($id);
        $sales->customer_name = $request->customer_name;
        $sales->project_id = $request->project_name;
        $sales->product_id = $request->product_name;
        $sales->employee_id = $request->employee_name;
        $sales->customer_id = $request->customer_name;
        $sales->description = $request->description;
        $sales->amount = $request->amount;
        $sales->amount_paid = $request->amount_paid;
        $sales->amount_due = $request->amount_due;
        $sales->sales_date = $request->sales_date;
        $sales->save(); 

        return redirect()->route('allSales')->with('success','Sales Updated Successfully!');
    }
    public function deleteSales($id)
    {
        $sales = Sale::find($id);
        $sales->delete();
        return redirect()->back()->with('danger','Sales Deleted Successfully!');
    }
}