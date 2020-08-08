<?php

namespace App\Http\Controllers;

use App\Lgroup;
use Illuminate\Http\Request;

class LgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lgroups = Lgroup::all();
        return view('lgroup.view', compact('lgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lgroup.create');
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
            'code' => 'required'
        ]);

        $lgroup = new Lgroup;
        $lgroup->name = $request->name;
        $lgroup->code = $request->code;
        $lgroup->save(); 

        return redirect()->back()->with('success','Ledger Group Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Lgroup $lgroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Lgroup $lgroup)
    {
        return view('lgroup.edit',compact('lgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lgroup = Lgroup::findOrFail($request->id);

        $this->validate($request,[
            'name' => 'required',
            'code' => 'required'
        ]);

        $lgroup->update($request->all());

        return redirect()->route('lgroup.index')->with('success','Ledger Group Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lgroup $lgroup)
    {
        //
    }
}
