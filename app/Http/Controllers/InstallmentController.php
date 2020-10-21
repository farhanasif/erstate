<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Bank;
use App\Installment;

class InstallmentController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::all();
        $data['banks'] = Bank::all();
        return view('installment.create_installment',$data);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'buyer_name' => 'required',
            'project_name' => 'required',
            'amount_type' => 'required',
            'installment_amount' => 'required',
            'combined_amount' => 'required',
            'due_amount' => 'required',
            'installment_date' => 'required',
        ]);

        $installments = new Installment;
        $installments->buyer_name = $request->buyer_name;
        $installments->project_id = $request->project_name;
        $installments->amount_type = $request->amount_type;
        $installments->installment_amount = $request->installment_amount;
        $installments->combined_amount = $request->combined_amount;
        $installments->due_amount = $request->due_amount;
        $installments->installment_date = $request->installment_date;
        $installments->save();
        
        return back()->with('success','Installment info added successfully');
    }
}
