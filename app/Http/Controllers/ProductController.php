<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Project;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showAddProduct()
    {
        $projects = Project::all();
        return view('product.add_product', compact('projects'));
    }

    public function allProduct()
    {
        // $data['products'] = Product::all();

        $data['productsInformations'] = DB::select("SELECT products.*, projects.id AS project_id, (projects.name) AS project_name
            FROM products
            LEFT JOIN projects ON products.project_id = projects.id");

        return view('product.all_product', $data);
    }

    public function storeProduct(Request $request)
    {
        // dd($request->all());

        $total_f_p = $request->flat_size * $request->unit_price;
        $net_t = ($total_f_p + $request->car_parking_charge + $request->utility_charge + $request->additional_work_charge + $request->other_charge)
                  - ($request->discount + $request->refund_additional_work_charge);

        $this->validate($request,[
            'project_name' => 'required',
            'flat_type' => 'required',
            'floor_number' => 'required',
            'flat_size' => 'required',
            'unit_price' => 'required',
            'car_parking_charge' => 'required',
            'utility_charge' => 'required',
            'additional_work_charge' => 'required',
            'other_charge' => 'required',
            'discount' => 'required',
            'refund_additional_work_charge' => 'required',
            'description' => 'required',
        ]);
        
        // $fileName = time().'.'.$request->file_attached->getClientOriginalName();  
        // $directory = 'uploads/';
        // $file_attached =  $request->file_attached->move($directory, $fileName);

            $data = $request->input('file_attached');
            $photo = $request->file('file_attached')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $file_attached = $request->file('file_attached')->move($destination, $photo);



            $projects = new Product;
            $projects->project_id = $request->project_name;
            $projects->flat_type = $request->flat_type;
            $projects->floor_number = $request->floor_number;
            $projects->flat_size = $request->flat_size;
            $projects->unit_price = $request->unit_price;
            $projects->total_flat_price =   $total_f_p;
            $projects->car_parking_charge = $request->car_parking_charge;
            $projects->utility_charge = $request->utility_charge;
            $projects->additional_work_charge = $request->additional_work_charge;
            $projects->other_charge = $request->other_charge;
            $projects->discount = $request->discount;
            $projects->refund_additional_work_charge = $request->refund_additional_work_charge;
            $projects->net_total = $net_t;
            $projects->file_attached = $file_attached;
            $projects->description = $request->description;
            $projects->save();

            return redirect()->back()->with('success','Product Added Successfully');

    }

    public function editProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['projects'] = Project::all();
         return view('product.edit_product',$data);
    }

    public function updateProduct(Request $request, $id)
    {
        $total_f_p = $request->flat_size * $request->unit_price;
        $net_t = ($total_f_p + $request->car_parking_charge + $request->utility_charge + $request->additional_work_charge + $request->other_charge)
                  - ($request->discount + $request->refund_additional_work_charge);

        $this->validate($request,[
            'project_name' => 'required',
            'flat_type' => 'required',
            'floor_number' => 'required',
            'flat_size' => 'required',
            'unit_price' => 'required',
            'car_parking_charge' => 'required',
            'utility_charge' => 'required',
            'additional_work_charge' => 'required',
            'other_charge' => 'required',
            'discount' => 'required',
            'refund_additional_work_charge' => 'required',
            'description' => 'required',
        ]);
        
        // $fileName = time().'.'.$request->file_attached->getClientOriginalName();  
        // $directory = 'uploads/';
        // $file_attached =  $request->file_attached->move($directory, $fileName);

            $data = $request->input('file_attached');
            $photo = $request->file('file_attached')->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $file_attached = $request->file('file_attached')->move($destination, $photo);



            $projects = Product::find($id);
            $projects->project_id = $request->project_name;
            $projects->flat_type = $request->flat_type;
            $projects->floor_number = $request->floor_number;
            $projects->flat_size = $request->flat_size;
            $projects->unit_price = $request->unit_price;
            $projects->total_flat_price =   $total_f_p;
            $projects->car_parking_charge = $request->car_parking_charge;
            $projects->utility_charge = $request->utility_charge;
            $projects->additional_work_charge = $request->additional_work_charge;
            $projects->other_charge = $request->other_charge;
            $projects->discount = $request->discount;
            $projects->refund_additional_work_charge = $request->refund_additional_work_charge;
            $projects->net_total = $net_t;
            $projects->file_attached = $file_attached;
            $projects->description = $request->description;
            $projects->save();
        return redirect()->route('allProduct')->with('success','Product Updated Successfully!');
    }
    public function deleteProduct($id)
    {
        $project = Product::find($id);
        $project->delete();
        return redirect()->back()->with('danger','Product Deleted Successfully!');
    }
}
