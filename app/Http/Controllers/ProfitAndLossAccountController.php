<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfitAndLossAccountController extends Controller
{
    public function index(){
        return view('report.profit_loss_account');
    }
}
