<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costEvent_Model;
use App\Models\costModel;
use App\Models\Lenging_Model;
use App\Models\BorrowModel;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function Auth(){
        $month = date("Y-m");
        $monthlyIncome = DB::table('table_income')->where('created','like',"{$month}%")->get();
        $monthlyCost = DB::table('table_cost')->where('created','like',"{$month}%")->get();
        $totalBorrow = json_decode(BorrowModel::orderby('id', 'desc')->get());
        $totalLend = json_decode(Lenging_Model::orderby('id', 'desc')->get());
        return view('Auth', ['mon_in'=>$monthlyIncome, 'mon_co'=>$monthlyCost, 'total_len'=>$totalLend, 'total_bor'=>$totalBorrow]);
    }
}
