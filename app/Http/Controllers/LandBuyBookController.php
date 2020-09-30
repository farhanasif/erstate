<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandBuyBookController extends Controller
{
    public function showAddLandbuybook()
    {
        return view('land_buy_book.add_land_buy_book');
    }
}
