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
        $project_id = $request->project_name;
        $from_date = date('Y-m-d 00:00:00', strtotime($request->from_date));
        $to_date = date('Y-m-d 00:00:00', strtotime($request->to_date));

        // dd($from_date);

        $data['projectDetails']=DB::select('select * from projects where id='.$project_id);
         // dd($data['projectDetails']);

        $data['from_dat'] = $from_date = date('Y-m-d ', strtotime($request->from_date));
        $data['to_dat'] = $to_date = date('Y-m-d', strtotime($request->to_date));

        $data['trial_balance_details'] = DB::table('vouchers as v')
                   ->select('v.*','vd.id as vd_id','vd.lname_id', 'vd.amount', 'l.name as ledger_name','p.name','p.id as p_id')
                   ->join('voucher_details as vd','v.id','=','vd.voucher_id')
                   ->join('lnames as l','l.id','=','vd.lname_id')
                   ->join('projects as p','p.id','=','v.project_id')
                   ->where( 'p.id', '=', $project_id)
                   ->whereBetween('v.voucher_date',[$from_date,$to_date])
                   ->get();
                   // dd($data['trial_balance_details']);   

        return view('print_report.print_trial_balance',$data);
    }
}
