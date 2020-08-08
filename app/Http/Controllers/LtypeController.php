<?php

namespace App\Http\Controllers;

use App\Ltype;
use Illuminate\Http\Request;

class LtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ltypes = Ltype::all();
        return view('ltype.view', compact('ltypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ltype.create');
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

        $ltype = new Ltype;
        $ltype->name = $request->name;
        $ltype->code = $request->code;
        $ltype->save(); 

        return redirect()->back()->with('success','Ledger Type Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ltype  $ltype
     * @return \Illuminate\Http\Response
     */
    public function show(Ltype $ltype)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ltype  $ltype
     * @return \Illuminate\Http\Response
     */
    public function edit(Ltype $ltype)
    {
        //$customer = Customer::find($id);
        return view('ltype.edit',compact('ltype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ltype  $ltype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ltype = Ltype::findOrFail($request->id);

        $this->validate($request,[
            'name' => 'required',
            'code' => 'required'
        ]);

        $ltype->update($request->all());

        return redirect()->route('ltype.index')->with('success','Ledger Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ltype  $ltype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ltype $ltype)
    {
        //
    }
}
