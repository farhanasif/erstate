<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundTransferController extends Controller
{
    public function index()
    {
        return view('fund_transfer.add_fund_transfer');
    }

    public function create()
    {
        return view('');
    }
}
