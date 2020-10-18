<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class TradingAccountController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('report.trading_account',compact('projects'));
        //return view('print_report.print_trading_account');
    }

    public function printTradingAccounts(){
        return view('print_report.print_trading_accounts');
    }
}
