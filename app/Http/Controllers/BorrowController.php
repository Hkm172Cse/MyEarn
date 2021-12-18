<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costEvent_Model;
use App\Models\costModel;
use App\Models\Lenging_Model;
use App\Models\BorrowModel;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    public function index(){
        $events = json_decode(BorrowModel::orderby('id', 'desc')->get());
        $eve = json_decode(BorrowModel::orderby('id', 'desc')->get());
        return view('componant.borrow', ['events'=>$events, 'eve'=>$eve ]);
    }

    public function getAllBorrow(){
        $result = json_decode(BorrowModel::where('amount','>', 0)->orderby('id', 'desc')->get());
        if($result==true){
            return $result;
        }else{
            return 0;
        }
   }

    public function Borrow_add_method(Request $req){
        $costName = $req->input('costName');
        $amount = $req->input('amount');

        $result  = BorrowModel::insert(['name'=>$costName, 'amount'=>$amount]);

        if($result == true){
            return 1;
        }else{
            return 0;
        }
    } 

    public function selectEditData(Request $req){
        $id = $req->input('editid');
        $result =  json_encode(BorrowModel::where('id', '=', $id)->get()); 
        return $result;
    }

    public function payBorrowMethod(Request $req){
        $id = $req->input('payid');
        $payamount = $req->input('updateAmount');
         
       // $result  = Lenging_Model::where('id', '=', $id)->update(['amount'=>$payamount]);
      $result = DB::table('table_borrow')
             ->where('id', $id)
             ->update(['amount' => $payamount]);
 
       if($result == true){
           return 1;
       }else{
           return 0;
       }
    }
    
    

}
