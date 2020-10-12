<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProfitAndLossAccountController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('report.profit_loss_account',compact('projects'));
    }
}
