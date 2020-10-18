<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProfitAndLossAccountController extends Controller
{
    public function index(){
        $projects = Project::all();
       // return view('report.profit_loss_account',compact('projects'));
       return view('report.profit_loss_account',compact('projects'));
   }


   // public function printProfitLossAccount(Request $request)
   // {
   //     $project_name = $request->project_name;
   //     $from_date = date('Y-m-d H:m:s', strtotime($request->from_date));
   //     $to_date = date('Y-m-d H:m:s', strtotime($request->to_date));

   //     $data['from_date'] = date('d M Y', strtotime($from_date));
   //     $data['to_date'] = date('d M Y', strtotime($to_date));

   //     return view('print_report.print_balance_sheet',$data);
   // }

   public function printProfitLossAccount(){
       return view('print_report.print_profit_loss');
   }
}
