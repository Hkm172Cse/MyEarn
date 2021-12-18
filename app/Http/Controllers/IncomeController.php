<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costEvent_Model;
use App\Models\costModel;
use App\Models\IncomeModel;
use App\Models\incomeCatagoryModel;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function index(){
        $catagory = json_decode(incomeCatagoryModel::orderby('id', 'desc')->get());
        $cat = json_decode(incomeCatagoryModel::orderby('id', 'desc')->get());
        return view('componant.income', ['catagory'=>$catagory, 'cat'=>$cat ]);
    }

    public function addcatagory(){
        $events = json_decode(incomeCatagoryModel::orderby('id', 'desc')->get());
        $eve = json_decode(incomeCatagoryModel::orderby('id', 'desc')->get());
        return view('componant.income_catagory', ['events'=>$events, 'eve'=>$eve ]);
    }

    public function catagory_add(Request $req){
        $event_name = $req->input('event_name');
        $result = incomeCatagoryModel::insert(['catagory'=>$event_name]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    public function catagory_delete(Request $req){
        $id = $req->input('catagory_id');
        $result = incomeCatagoryModel::where('id','=', $id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    public function getAllCostCatagory(){
        $result = json_decode(incomeCatagoryModel::orderby('id', 'desc')->get());
        if($result==true){
            return $result;
        }else{
            return 0;
        }
   }

    public function customDateIncome(Request $req){
        $created =  $req->input('getIncome');
        $category = $req->input('category');
        if($category != ""){
             $result = DB::table('table_income')
             ->where('created', 'LIKE', "%{$created}%")
             ->where('catagory', 'LIKE', "%{$category}%")
             ->get();
             
             return $result;
        }else{
          
             $result = DB::table('table_income')->where('created','like',"{$created}%")->get();
             return $result;
        }
        
        
     }

     public function IncomeMethod(Request $req){
        $income_name = $req->input('costName');
        $catagory = $req->input('event');
        $amount = $req->input('amount');

        $result  = IncomeModel::insert(['event_name'=>$income_name, 'catagory'=>$catagory, 'amount'=>$amount]);

       if($result == true){
           return 1;
       }else{
           return 0;
       }
    }
}
