<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;

class TradingAccountController extends Controller
{
    public function index(){
        $all_data = DB::select(
            "SELECT projects.id, projects.name, vouchers.voucher_date
            FROM projects
            INNER JOIN vouchers ON projects.id=vouchers.project_id;"
             );
        $projects = Project::all();
        return view('report.trading_account',compact('projects'));

    }

    public function printTradingAccounts(){
        return view('print_report.print_trading_accounts');
    }
}
