<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceSheetController extends Controller
{
    public function index(){
        return view('report.balance_sheet');
        // return view('print_report.print_balance_sheet');
    }

    public function printBalanceSheet(Request $request)
    {
        $from_date = date('Y-m-d H:m:s', strtotime($request->from_date));
        $to_date = date('Y-m-d H:m:s', strtotime($request->to_date));

        $data['from_date'] = date('d M Y', strtotime($from_date));
        $data['to_date'] = date('d M Y', strtotime($to_date));

        return view('print_report.print_balance_sheet',$data);
    }
}
