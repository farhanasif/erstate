<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Bank;
use App\Installment;
use App\Landowner;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\DB;

class InstallmentController extends Controller
{
    public function index()
    {
        $installments = DB::table('installments as ins')
        ->select('ins.*','p.name as project_name','p.id as p_id')
        ->join('projects as p','p.id','=','ins.project_id')
        ->get();

        // dd($installments);
        return view('installment.all_installment',compact('installments'));
    }
    public function create()
    {
        $data['projects'] = Project::all();
        $data['banks'] = Bank::all();
        return view('installment.create_installment',$data);
    }

    public function land_owner_data(Request $request)
    {
        $project_id = $request->project_name;
        $land_owner_info = Landowner::where('project_id',$project_id)->get();
        return json_encode($land_owner_info);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'land_owner_name' => 'required',
            'project_name' => 'required',
            'amount_type' => 'required',
            'installment_amount' => 'required',
            'combined_amount' => 'required',
            'due_amount' => 'required',
            'installment_date' => 'required',
        ]);

        $installments = new Installment;
        $installments->land_owner_name = $request->land_owner_name;
        $installments->project_id = $request->project_name;
        $installments->amount_type = $request->amount_type;
        $installments->installment_amount = $request->installment_amount;
        $installments->combined_amount = $request->combined_amount;
        $installments->due_amount = $request->due_amount;
        $installments->installment_date = $request->installment_date;
        $installments->save();

        return back()->with('success','Installment info added successfully');
    }

    public function edit($id)
    {
        $data['projects'] = Project::all();
        $data['banks'] = Bank::all();
        $data['installments'] = Installment::find($id); 
        $data['owner_names'] = Landowner::all();

        // dd($data);
        return view('installment.edit_installment',$data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'land_owner_name' => 'required',
            'project_name' => 'required',
            'amount_type' => 'required',
            'installment_amount' => 'required',
            'combined_amount' => 'required',
            // 'due_amount' => 'required',
            'installment_date' => 'required',
        ]);

        $installments = Installment::find($id);
        $installments->land_owner_name = $request->land_owner_name;
        $installments->project_id = $request->project_name;
        $installments->amount_type = $request->amount_type;
        $installments->installment_amount = $request->installment_amount;
        $installments->combined_amount = $request->combined_amount;
        $installments->due_amount = $request->due_amount;
        $installments->installment_date = $request->installment_date;
        $installments->save();

        return back()->with('success','Installment info updated successfully');
    }

    public function delete($id)
    {
        $installment = Installment::find($id);
        if($installment){
            $installment->delete();
            return back()->with('succes',' Installment deleted successfully!');
        }else{

            return back()->with('error','Do not deleted Installment data');
        }
    }
}
