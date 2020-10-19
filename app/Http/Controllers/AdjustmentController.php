<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Adjustment;

class AdjustmentController extends Controller
{
    public function create()
    {
        $data['ledger_groups'] = DB::table('lgroups')->get();
        $data['ledger_names'] = DB::table('lnames')->get();
        $data['projects'] = DB::table('projects')->get();

        return view('adjustment.add_adjusment',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $adjustments = new Adjustment;
        $adjustments->project_id = $request->project_name;
        $adjustments->lname_id = $request->ledger_name;
        $adjustments->type = $request->type;
        $adjustments->amount = $request->amount;
        $adjustments->percentage = $request->percentage;
        $adjustments->particulars = $request->particular;
        $adjustments->save();

        return redirect()->back()->with('success','Adjustment successfully added');

    }
}
