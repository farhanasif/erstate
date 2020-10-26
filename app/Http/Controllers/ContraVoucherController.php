<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Contra;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContraVoucherController extends Controller
{
    public function index()
    {
        $contra_vouchers = DB::table('contras as c')
        ->join('projects as p', 'c.project_id', '=', 'p.id')
        ->join('banks as b', 'c.bank_id', '=', 'b.id')
        ->select('c.*', 'p.name as project_name', 'b.name as bank_name','b.id as bank_id')
        ->get();

        return view('contra_voucher.view_contra_voucher',compact('contra_vouchers'));
    }

    public function create()
    {
        $data['banks'] = Bank::all();
        $data['projects'] = Project::all();
        return view('contra_voucher.create_contra_voucher',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'project_name' => 'required',
            'bank_id_dr' => 'required',
            'bank_id_cr' => 'required',
            'voucher_no' => 'required',
            'voucher_date' => 'required',
            'amount' => 'required',
            'perticulers' => 'required',
        ]);

        $contras = new Contra;
        $contras->project_id = $request->project_name;
        $contras->bank_id = $request->bank_id_dr;
        // $contras->bank_id_cr = $request->bank_id_cr;
        $contras->check_no = $request->bank_id_dr == 11 ?'' : $request->check_no;
        $contras->voucher_no = $request->voucher_no;
        $contras->voucher_date = $request->voucher_date;
        $contras->amount = $request->amount;
        $contras->amount_type =  $request->bank_id_dr ? 'DR' : '';
        $contras->perticulers = $request->perticulers;
        $contras->save();

        $contras = new Contra;
        $contras->project_id = $request->project_name;
        // $contras->bank_id_dr = $request->bank_id_dr;
        $contras->bank_id = $request->bank_id_cr;
        // $contras->check_no = $request->check_no;
        $contras->check_no = $request->bank_id_cr == 11 ? '' : $request->check_no;
        $contras->voucher_no = $request->voucher_no;
        $contras->voucher_date = $request->voucher_date;
        $contras->amount = $request->amount;
        $contras->amount_type =  $request->bank_id_cr ? 'CR' : '';
        $contras->perticulers = $request->perticulers;
        $contras->save();

        return redirect()->back()->with('success','Contra Voucher added successfully!');
    }

    public function edit($id)
    {
        $data['contra'] = Contra::find($id);
        $data['banks'] = Bank::all();
        $data['projects'] = Project::all();
         return view('contra_voucher.edit_contra_voucher', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'project_name' => 'required',
            'bank_id_dr' => 'required',
            'bank_id_cr' => 'required',
            'voucher_no' => 'required',
            'voucher_date' => 'required',
            'amount' => 'required',
            'perticulers' => 'required',
        ]);

        $contras = Contra::find($id);
        $contras->project_id = $request->project_name;
        $contras->bank_id_dr = $request->bank_id_dr;
        $contras->bank_id_cr = $request->bank_id_cr;
        $contras->check_no = $request->check_no;
        $contras->voucher_no = $request->voucher_no;
        $contras->voucher_date = $request->voucher_date;
        $contras->amount = $request->amount;
        $contras->perticulers = $request->perticulers;
        $contras->save();

        return redirect()->route('allContraVoucher')->with('success','Contra Voucher updated successfully!');
    }


    public function delete($id)
    {
        $contra = Contra::find($id);
        if($contra){
            $contra->delete();
            return redirect()->back()->with('success','Contra Voucher deleted successfully!');
        }else{
            return redirect()->back()->with('danger','Contra Voucher do not deleted!');
        }
    }
}
