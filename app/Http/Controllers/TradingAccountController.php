<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class TradingAccountController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('report.trading_account',compact('projects'));
        // return view('print_report.print_trading_account');
    }

    // public function printTradingAccount(Request $request)
    // {
    //     $from_date = date('Y-m-d H:m:s', strtotime($request->from_date));
    //     $to_date = date('Y-m-d H:m:s', strtotime($request->to_date));

    //     $data['from_date'] = date('d M Y', strtotime($from_date));
    //     $data['to_date'] = date('d M Y', strtotime($to_date));

    //     return view('print_report.print_balance_sheet',$data);
    // }

    public function printTradingAccounts(){
        return view('print_report.print_trading_accounts');
    }
}
