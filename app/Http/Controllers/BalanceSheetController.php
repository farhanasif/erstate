<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;

class BalanceSheetController extends Controller
{
    public function index(){
        $projects = Project::all();
        // dd($projects);
        return view('report.balance_sheet',compact('projects'));
        // return view('print_report.print_balance_sheet');
    }

    public function printBalanceSheet(Request $request)
    {
        $project_id = $request->project_id;

        $data['liabilities'] = DB::select("SELECT vd.amount, l.name as l_name FROM `lnames` AS l
                        JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                        JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                        JOIN `vouchers` AS v ON v.id = vd.voucher_id
                        WHERE l.lgroup_id = 3 AND l.ltype_id = 2 AND v.project_id = ".$project_id);

        $data['assets'] = DB::select("SELECT vd.amount, l.name as l_name FROM `lnames` AS l
                        JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                        JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                        JOIN `vouchers` AS v ON v.id = vd.voucher_id
                        WHERE l.lgroup_id = 3 AND l.ltype_id = 4 AND v.project_id =".$project_id);


        $data['adjustments'] = DB::select("select ad.*, l.name as ledger_name, vd.amount as vd_amount from adjustments as ad 
                join lnames as l on l.id = ad.lname_id 
                join voucher_details as vd on vd.lname_id = l.id
                where ad.type = 2 and ad.project_id = ".$project_id);

        // this year net profit calculation
        $data['income'] = DB::select("SELECT vd.amount, l.name as l_name FROM `lnames` AS l
                JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                JOIN `vouchers` AS v ON v.id = vd.voucher_id
                WHERE l.lgroup_id = 1 AND l.ltype_id = 1 AND v.project_id = ".$project_id);

        $data['t_adjustment'] = DB::select("select sum(amount) as total_amount from adjustments as ad where ad.type = 2 and ad.project_id = ".$project_id);

        $data['total_income'] = 0;
                foreach($data['income'] as $val) {
                ($val->l_name == "Sales Commission" ? $data['total_income'] -= $val->amount : $data['total_income'] += $val->amount);
                }

        $data['expen'] = DB::select("SELECT sum(vd.amount) as total_expen FROM `lnames` AS l
                                JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                                JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                                JOIN `vouchers` AS v ON v.id = vd.voucher_id
                                WHERE l.lgroup_id = 1 AND l.ltype_id = 3 AND v.project_id = ".$project_id);


        $data['profite_head'] = DB::select("SELECT sum(vd.amount) as profit_amount FROM `lnames` AS l
                                    JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                                    JOIN `vouchers` AS v ON v.id = vd.voucher_id
                                    WHERE l.lgroup_id = 2 AND v.project_id = ".$project_id);

                                    // dd($data);

        $data['this_year_profit'] =  $data['total_income'] - ( $data['expen'][0]->total_expen + $data['profite_head'][0]->profit_amount + $data['t_adjustment'][0]->total_amount);
        // dd($data['this_year_profit']);


        return view('print_report.print_balance_sheet',$data);
    }
}
