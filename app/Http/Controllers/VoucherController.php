<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\VoucherDetail;
use App\Project;
use App\Bank;
use App\Lname;
use App\Journal;
use App\JournalDetails;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher_details = DB::table('voucher_details')
            ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
            ->join('projects', 'vouchers.project_id', '=', 'projects.id')
            ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
            ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
            ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.perticulers','vouchers.cheque_no')
            ->get();
        //dd($voucher_details);
        return view('voucher.view_credit', compact('voucher_details'));
    }

    public function allcreditvoucherDataTable(){
        $voucher_details = DB::table('voucher_details')
        ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        ->join('projects', 'vouchers.project_id', '=', 'projects.id')
        ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
        ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
        ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.perticulers','vouchers.cheque_no')
        ->where('voucher_type', 'CR')
        ->get();

        foreach($voucher_details as $dat){
            $customData[]=[
                'voucher_id'=>$dat->voucher_id,
                'voucher_date'=>$dat->voucher_date,
                'lname'=>$dat->lname,
                'bank_name'=>$dat->bank_name,
                'cheque_no'=>$dat->cheque_no,
                'amount'=>$dat->amount,
                'project_name'=>$dat->project_name,
                'perticulers'=>$dat->perticulers,

            ];
        }
    //dd($customData);
        $data_table_render= DataTables::of($customData)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    //$edit_url=url('sales/edit-sales/'.$row['id']);
                // return '<a href="#" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                //      '<button onClick="#" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creditvoucher()
    {
        $projects = Project::all();
        $banks = Bank::all();
        $lnames = Lname::all();
        return view('voucher.credit', compact('projects','banks','lnames'));
    }

    public function save_credit(Request $request){
        //dd($request);
        $this->validate($request,[
            'project_id' => 'required',
            'bank_id' => 'required',
        ]);

        $ledger_count = sizeof($request->lname_id);
        if($ledger_count > 0){
            $voucher = new Voucher;
            $voucher->project_id = $request->project_id;
            $voucher->bank_id = $request->bank_id;
            $voucher->cheque_no = $request->cheque_no;
            $voucher->perticulers = $request->perticulers;
            $voucher->voucher_type = 'CR';
            $voucher->voucher_date = $request->voucher_date;
            $voucher->save();

            for($i = 0; $i < $ledger_count; $i++){
                $voucher_detail = new VoucherDetail;
                $voucher_detail->voucher_id = $voucher->id;
                $voucher_detail->lname_id = $request->lname_id[$i];
                $voucher_detail->amount = $request->amount[$i];
                $voucher_detail->save();
            }

            return redirect()->back()->with('success','Credit Voucher Added Successfully!');
        }
        else{
            return redirect()->back()->with('error','Credit Voucher failed to add, must add account head with amount!');
        }
    }



    public function alldebitvoucher()
    {
        $voucher_details = DB::table('voucher_details')
            ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
            ->join('projects', 'vouchers.project_id', '=', 'projects.id')
            ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
            ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
            ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.perticulers','vouchers.cheque_no')
            ->get();
        //dd($voucher_details);
        return view('voucher.view_debit', compact('voucher_details'));
    }

    public function allDebitVoucherDataTable(){
        $voucher_details = DB::table('voucher_details')
            ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
            ->join('projects', 'vouchers.project_id', '=', 'projects.id')
            ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
            ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
            ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.cheque_no','vouchers.perticulers')
            //->where('voucher_type', 'DR')
            ->get();
        //dd($voucher_details);

            foreach($voucher_details as $dat){
                $customData[]=[
                    'voucher_id'=>$dat->voucher_id,
                    'voucher_date'=>$dat->voucher_date,
                    'lname'=>$dat->lname,
                    'bank_name'=>$dat->bank_name,
                    'cheque_no'=>$dat->cheque_no,
                    'amount'=>$dat->amount,
                    'project_name'=>$dat->project_name,
                    'perticulers'=>$dat->perticulers,
    
                ];
            }

            $data_table_render= DataTables::of($customData)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    //$edit_url=url('sales/edit-sales/'.$row['id']);
                // return '<a href="#" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                //      '<button onClick="#" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function debitvoucher()
    {
        $projects = Project::all();
        $banks = Bank::all();
        $lnames = Lname::all();
        return view('voucher.debit', compact('projects','banks','lnames'));
    }

    public function save_debit(Request $request){
        //dd($request);
        $this->validate($request,[
            'project_id' => 'required',
            'bank_id' => 'required',
        ]);

        $ledger_count = sizeof($request->lname_id);
        if($ledger_count > 0){
            $voucher = new Voucher;
            $voucher->project_id = $request->project_id;
            $voucher->bank_id = $request->bank_id;
            $voucher->cheque_no = $request->cheque_no;
            $voucher->perticulers = $request->perticulers;
            $voucher->voucher_type = 'DR';
            $voucher->voucher_date = $request->voucher_date;
            $voucher->save();

            for($i = 0; $i < $ledger_count; $i++){
                $voucher_detail = new VoucherDetail;
                $voucher_detail->voucher_id = $voucher->id;
                $voucher_detail->lname_id = $request->lname_id[$i];
                $voucher_detail->amount = $request->amount[$i];
                $voucher_detail->save();
            }

            return redirect()->back()->with('success','Debit Voucher Added Successfully!');
        }
        else{
            return redirect()->back()->with('error','Debit Voucher failed to add, must add account head with amount!');
        }
    }


    public function journalvoucher()
    {
        $projects = Project::all();
        $lnames = Lname::all();
        $banks = Bank::all();
        return view('voucher.create_journal', compact('projects','lnames','banks'));
    }

    public function alljournalvoucher()
    {
        $journals = DB::table('journal_details as jd')
        ->select('jd.*','j.perticulers','j.journal_date', 'l.name as ledger_name','p.name as project_name','p.id as p_id')
        ->join('lnames as l','l.id','=','jd.lname_id')
        ->join('journals as j','j.id','=','jd.journal_id')
        ->join('projects as p','p.id','=','jd.project_id')
        ->get();
         //dd($journals);
        return view('voucher.view_journal',compact('journals'));
    }

    public function save_journal(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
        'perticulers' => 'required',
        'journal_date' => 'required',
        ]);

        $ledger_count = sizeof($request->lname_id_dr);
        if ($ledger_count > 0) {
            $journal = new Journal;
            $journal->perticulers = $request->perticulers;
            $journal->journal_date = $request->journal_date;
            $journal->save();

            for ($i = 0; $i < $ledger_count; $i++) {
                $journal_detail = new JournalDetails;
                $journal_detail->journal_id = $journal->id;
                $journal_detail->project_id = $request->project_id_dr;
                $journal_detail->lname_id = $request->lname_id_dr[$i];
                $journal_detail->amount = $request->amount_dr[$i];
                $journal_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
                $journal_detail->save();

                //JournalDetails
                $journal_detail = new JournalDetails;
                $journal_detail->journal_id = $journal->id;
                $journal_detail->project_id = $request->project_id_cr;
                $journal_detail->lname_id = $request->lname_id_cr[$i];
                $journal_detail->amount = $request->amount_cr[$i];
                $journal_detail->journal_type = $request->lname_id_cr[$i] ? 'CR' : '';
                $journal_detail->save();
    

                //Voucher
                //$bankId= $request->bank_id;
               // dd($bankId);
                // foreach ($bankId as $is_optional => $bId) {
                //     //dd($bId);
                // if($bId > 0){    
                $voucher = new Voucher;
                //dd($voucher);
                $voucher->project_id = $request->project_id_dr;
                $voucher->bank_id = $request->bank;
                $voucher->cheque_no = $request->cheque_no;
                $voucher->perticulers = $request->perticulers;
                $voucher->voucher_date = $request->journal_date;
                $voucher->voucher_type = $request->lname_id_dr[$i] ? 'DR' : '';
                $voucher->save();

                $voucher = new Voucher;
                $voucher->project_id = $request->project_id_cr;
                $voucher->bank_id = $request->bank;
                $voucher->cheque_no = $request->cheque_no;
                $voucher->perticulers = $request->perticulers;
                $voucher->voucher_date = $request->journal_date;
                $voucher->voucher_type = $request->lname_id_cr[$i] ? 'CR' : '';
                $voucher->save();
                 
                
                //VoucherDetail
                $voucher_detail = new VoucherDetail;
                $voucher_detail->voucher_id = $voucher->id;
                $voucher_detail->lname_id = $request->lname_id_dr[$i];
                $voucher_detail->amount = $request->amount_dr[$i];
                // $voucher_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
                $voucher_detail->save();


                //VoucherDetail
                // $voucher_detail = new VoucherDetail;
                // $voucher_detail->voucher_id = $voucher->id;
                // $voucher_detail->lname_id = $request->lname_id_cr[$i];
                // $voucher_detail->amount = $request->amount_cr[$i];
                // // $voucher_detail->journal_type = $request->lname_id_cr[$i] ? 'CR' : '';
                // $voucher_detail->save();
            }
            return redirect()->back()->with('success', 'Journal Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Journal failed to add, must add account head with amount!');
        }
    }

}
