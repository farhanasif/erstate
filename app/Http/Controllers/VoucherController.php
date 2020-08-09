<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\VoucherDetail;
use App\Project;
use App\Bank;
use App\Lname;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
