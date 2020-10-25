<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyExpenditureSummarySheetController extends Controller
{
    public function dailyExpenditure(){
        return view('report.daily_expenditure_summary');
    }

    public function printDailyExpenditure(){
        return view('print_report.print_expenditure_summary_sheet');
    }
}
