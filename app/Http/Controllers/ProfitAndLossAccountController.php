<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;


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

   public function printProfitLossAccount(Request $request){
    $project_id = $request->project_name;
    $data['income'] = DB::select("SELECT sum(vd.amount) FROM `lnames` AS l
    JOIN `ltypes` AS lt ON lt.id = l.ltype_id
    JOIN `voucher_details` AS vd ON vd.lname_id = l.id
    JOIN `vouchers` AS v ON v.id = vd.voucher_id
    WHERE l.lgroup_id = 1 AND l.ltype_id = 1 AND v.project_id = ".$project_id);

    $data['expen'] = DB::select("SELECT sum(vd.amount) FROM `lnames` AS l
    JOIN `ltypes` AS lt ON lt.id = l.ltype_id
    JOIN `voucher_details` AS vd ON vd.lname_id = l.id
    JOIN `vouchers` AS v ON v.id = vd.voucher_id
    WHERE l.lgroup_id = 1 AND l.ltype_id = 3 AND v.project_id = ".$project_id);

    dd($data);
    
    return view('print_report.print_profit_loss');

   }
}
