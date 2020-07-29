<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function showAddEmployee()
    {
        return view('employee.add_employee');
    }

    public function allEmployee()
    {
        $employees = Employee::all();
        return view('employee.all_employee', compact('employees'));
    }

    public function storeEmployee(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nid' => 'required',
            'department' => 'required',
        ]);

        $employees = new Employee;
        $employees->name = $request->name;
        $employees->position = $request->position;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->nid = $request->nid;
        $employees->department = $request->department;
        $employees->save(); 

        return redirect()->back()->with('success','Employee Added Successfully!');
    }

    public function editEmployee($id)
    {
        $employee = Employee::find($id);
         return view('employee.edit_employee',compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        // dd($request->all());

        $this->validate($request,[
            'name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nid' => 'required',
            'department' => 'required',
        ]);

        $employees = Employee::find($id);
        $employees->name = $request->name;
        $employees->position = $request->position;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->nid = $request->nid;
        $employees->department = $request->department;
        $employees->save(); 

        return redirect()->route('allEmployee')->with('success','Employee Updated Successfully!');
    }
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back()->with('danger','Employee Deleted Successfully!');
    }
}
