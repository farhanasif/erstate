<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Project;
use Illuminate\Http\Request;
use App\Requisition;
use Illuminate\Support\Facades\DB;

class RequisitionController extends Controller
{
    public function showAddRequisition()
    {
        $data['projects'] = Project::all();
        $data['employees'] = Employee::all();

        return view('requisition.add_requisition',$data);
    }

    public function allRequisition()
    {
        // $data['requisitions'] = Requisition::all();

        $data['requisitionInformations'] = DB::select(
            "SELECT requisitions.*,
             projects.id AS project_id, (projects.name) AS project_name ,
            (employees.id) AS employee_id, (employees.name) AS employee_name
            FROM requisitions
            LEFT JOIN projects ON requisitions.project_id = projects.id
            LEFT JOIN employees ON requisitions.employee_id = employees.id");

            // dd($data['requisitionInformations']);

        return view('requisition.all_requisition',$data);
    }

    public function storeRequisition(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'project_name' => 'required',
            'employee_name' => 'required',
            'contact_person' => 'required',
            'remark' => 'required',
            'purpose' => 'required',
            'requisition_date' => 'required',
            'required_date' => 'required',
            'status' => 'required',
        ]);
        
        $requisitions = new Requisition;
        $requisitions->project_id = $request->project_name;
        $requisitions->employee_id = $request->employee_name;
        $requisitions->contact_person = $request->contact_person;
        $requisitions->remark = $request->remark;
        $requisitions->purpose = $request->purpose;
        $requisitions->requisition_date = $request->requisition_date;
        $requisitions->required_date = $request->required_date;
        $requisitions->status = $request->status;
        $requisitions->save(); 

        return redirect()->back()->with('success','Requisition Added Successfully!');
    }

    public function editRequisition($id)
    {
        $data['requisition'] = Requisition::find($id);
        $data['projects'] = Project::all();
        $data['employees'] = Employee::all();

         return view('requisition.edit_requisition', $data);
    }

    public function updateRequisition(Request $request, $id)
    {
        $this->validate($request,[
            'project_name' => 'required',
            'employee_name' => 'required',
            'contact_person' => 'required',
            'remark' => 'required',
            'purpose' => 'required',
            'requisition_date' => 'required',
            'required_date' => 'required',
        ]);

        $requisitions = Requisition::find($id);
        $requisitions->project_id = $request->project_name;
        $requisitions->employee_id = $request->employee_name;
        $requisitions->contact_person = $request->contact_person;
        $requisitions->remark = $request->remark;
        $requisitions->purpose = $request->purpose;
        $requisitions->requisition_date = $request->requisition_date;
        $requisitions->required_date = $request->required_date;
        $requisitions->save(); 

        return redirect()->route('allRequisition')->with('success','Requisition Updated Successfully!');
    }
    public function deleteRequisition($id)
    {
        $requisition = Requisition::find($id);
        $requisition->delete();
        return redirect()->back()->with('danger','Requisition Deleted Successfully!');
    }
}
