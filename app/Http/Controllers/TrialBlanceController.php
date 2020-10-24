<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;

class TrialBlanceController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('report.trial_balance',compact('projects'));
    }
    public function printTrialBalace(Request $request)
    {
        // $dr = DB::table('');
        $project_name = $request->project_name;
        $from_date = date('Y-m-d 00:00:00', strtotime($request->from_date));
        $to_date = date('Y-m-d 00:00:00', strtotime($request->to_date));

        $data['from_dat'] = $from_date = date('d M Y', strtotime($request->from_date));
        $data['to_dat'] = $to_date = date('d M Y', strtotime($request->to_date));


        $data['trial_balance_details'] = DB::table('vouchers as v')
                   ->select('v.*','vd.id as vd_id','vd.lname_id', 'vd.amount', 'l.name as ledger_name','p.name','p.id as p_id')
                   ->join('voucher_details as vd','v.id','=','vd.voucher_id')
                   ->join('lnames as l','l.id','=','vd.lname_id')
                   ->join('projects as p','p.id','=','v.project_id')
                   ->where( 'p.id', '=', $project_name)
                   ->get();

        // $data['trial_balance_details'] = DB::table('vouchers as v')
        //                                 ->select('v.*','vd.id as vd_id','vd.lname_id', 'vd.amount', 'l.name as ledger_name','p.name','p.id as p_id')
        //                                 ->join('voucher_details as vd','v.id','=','vd.voucher_id')
        //                                 ->join('lnames as l','l.id','=','vd.lname_id')
        //                                 ->join('projects as p','p.id','=','v.project_id')
        //                                 ->where( 'p.id', '=', $project_name, 'AND', 'v.voucher_date','>=',$from_date, 'AND' ,'v.voucher_date','<=',$to_date)
        //                                 ->get();

        // $data['trial_balance_details'] = DB::select("SELECT v.*,  vd.amount FROM `lnames` AS l
        //                         JOIN `ltypes` AS lt ON lt.id = l.ltype_id
        //                         JOIN `voucher_details` AS vd ON vd.lname_id = l.id
        //                         JOIN `vouchers` AS v ON v.id = vd.voucher_id
        //                         WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND  v.project_id = ".$project_name);
        // dd($data);
        
        return view('print_report.print_trial_balance',$data);
    }
}
