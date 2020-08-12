<?php

namespace App\Http\Controllers;

use App\Lname;
use App\Ltype;
use App\Lgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lnames = DB::table('lnames')
            ->join('lgroups', 'lnames.lgroup_id', '=', 'lgroups.id')
            ->join('ltypes', 'ltypes.id', '=', 'lnames.ltype_id')
            ->select('lnames.*', 'lgroups.name as lgroup_name', 'ltypes.name as ltype_name')
            ->get();
        //dd($lnames);
        return view('lname.view', compact('lnames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lgroups = Lgroup::all();
        $ltypes = Ltype::all();
        return view('lname.create', compact('lgroups','ltypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'ltype_id' => 'required',
            'lgroup_id' => 'required',
            'is_debit' => 'required'
        ]);

        //dd($request);

        $lname = new Lname;
        $lname->name = $request->name;
        $lname->is_debit = $request->is_debit;
        $lname->unit = $request->unit;
        $lname->ltype_id = $request->ltype_id;
        $lname->lgroup_id = $request->lgroup_id;
        $lname->save(); 

        return redirect()->back()->with('success','Ledger Group Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function show(Lname $lname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lname = Lname::find($id);
        $lgroups = Lgroup::all();
        $ltypes = Ltype::all();
        
        return view('lname.edit',compact('lname','lgroups','ltypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lname = Lname::findOrFail($request->id);

        $this->validate($request,[
            'name' => 'required',
            'ltype_id' => 'required',
            'lgroup_id' => 'required',
            'is_debit' => 'required'
        ]);

        $lname->update($request->all());

        return redirect()->route('lname.index')->with('success','Ledger Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $lname = Lname::findOrFail($request->id);
        $lname->delete();
        return redirect()->route('lname.index')->with('danger','Ledger Deleted Successfully!');
    }
}
