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
        // $from_date = date('Y-m-d H:m:s', strtotime($request->from_date));
        // $to_date = date('Y-m-d H:m:s', strtotime($request->to_date));

        // $data['from_date'] = date('d M Y', strtotime($from_date));
        // $data['to_date'] = date('d M Y', strtotime($to_date));

        $data = DB::table('vouchers as v')
                   ->select('v.*','vd.id as vd_id','vd.lname_id', 'vd.amount', 'l.name as ledger_name','p.name','p.id as p_id')
                   ->join('voucher_details as vd','v.id','=','vd.voucher_id')
                   ->join('lnames as l','l.id','=','vd.lname_id')
                   ->join('projects as p','p.id','=','v.project_id')
                   ->where('p.id','=',$project_name)
                   ->get();
        // dd($data);
        
        return view('print_report.print_trial_balance',compact('data'));
    }
}
