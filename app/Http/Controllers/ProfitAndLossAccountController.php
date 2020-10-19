<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProfitAndLossAccountController extends Controller
{
    public function index(){
        $projects = Project::all();
       // return view('report.profit_loss_account',compact('projects'));
       return view('report.profit_loss_account',compact('projects'));
   }


   public function printProfitLossAccount(){
       return view('print_report.print_profit_loss');
   }
    
}
