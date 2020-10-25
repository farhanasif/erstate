<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyIncomeSummarySheetController extends Controller
{
    public function dailyIncome(){
        return view('report.daily_income_summary');
    }

    public function printDailyIncome(){
        return view('print_report.print_income_summary_sheet');
    }
}
