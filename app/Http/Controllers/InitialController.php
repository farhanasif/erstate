<?php

namespace App\Http\Controllers;

use App\Initial;
use Illuminate\Http\Request;

class InitialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $initials = Initial::where('initial_type','BANK')->get();
        return view('initial.view', compact('initials'));
    }


    public function ledgerIndex()
    {
        $initials = Initial::where('initial_type','LEDGER')->get();
        return view('initial.ledgerview', compact('initials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function show(Initial $initial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function edit(Initial $initial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Initial $initial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Initial $initial)
    {
        //
    }
}
