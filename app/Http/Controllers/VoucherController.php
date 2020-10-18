<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\VoucherDetail;
use App\Project;
use App\Bank;
use App\Lname;
use App\Journal;
use App\Ltype;
use App\JournalDetails;
use Illuminate\Http\Request;
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
        $ltypes = Ltype::all();
        return view('voucher.credit', compact('projects','banks','lnames','ltypes'));
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
        return view('voucher.view_credit', compact('voucher_details'));
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
        $ltypes = Ltype::all();
        return view('voucher.debit', compact('projects','banks','lnames','ltypes'));
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
        $ltypes = Ltype::all();
        return view('voucher.create_journal', compact('projects','lnames','ltypes'));
    }

    public function alljournalvoucher()
    {
        // $voucher_details = DB::table('voucher_details')
        //     ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        //     ->join('projects', 'vouchers.project_id', '=', 'projects.id')
        //     ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
        //     ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
        //     ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.perticulers','vouchers.cheque_no')
        //     ->get();
        //dd($voucher_details);

        //bnvvbv
        return view('voucher.view_journal');
    }

    public function save_journal(Request $request){
        // dd($request->all());
        // $this->validate($request,[
        //     'perticulers' => 'required',
        //     'journal_date' => 'required',
        // ]);

        $ledger_count = sizeof($request->lname_id);
        if($ledger_count > 0){
            $journal = new Journal;
            $journal->perticulers = $request->perticulers;
            $journal->journal_date = $request->journal_date;
            $journal->save();

            for($i = 0; $i < $ledger_count; $i++){
                $journal_detail = new JournalDetail;
                $journal_detail->journal_id = $journal->id;
                $journal_detail->lname_id = $request->lname_id[$i];
                $journal_detail->amount = $request->amount[$i];
                $journal_detail->save();
            }

            return redirect()->back()->with('success','Journal Added Successfully!');
        }
        else{
            return redirect()->back()->with('error','Journal failed to add, must add account head with amount!');
        }
    }

}
