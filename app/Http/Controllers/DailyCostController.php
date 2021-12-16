<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costEvent_Model;
use App\Models\costModel;
use Illuminate\Support\Facades\DB;

class DailyCostController extends Controller
{
    public function index(){
        $events = json_decode(costEvent_Model::orderby('id', 'desc')->get());
        $eve = json_decode(costEvent_Model::orderby('id', 'desc')->get());
        return view('componant.DailyCost', ['events'=>$events, 'eve'=>$eve ]);
    }

    public function addcatagory(){
        $events = json_decode(costEvent_Model::orderby('id', 'desc')->get());
        $eve = json_decode(costEvent_Model::orderby('id', 'desc')->get());
        return view('componant.cost_catagory', ['events'=>$events, 'eve'=>$eve ]);
    }

    public function catagory_add(Request $req){
        $event_name = $req->input('event_name');
        $result = costEvent_Model::insert(['event_name'=>$event_name]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    public function CostMethod(Request $req){
        $costName = $req->input('costName');
        $event = $req->input('event');
        $amount = $req->input('amount');

        $result  = costModel::insert(['cost_name'=>$costName, 'event'=>$event, 'amount'=>$amount]);

       if($result == true){
           return 1;
       }else{
           return 0;
       }
    }

   public function getAllCostCatagory(){
        $result = json_decode(costEvent_Model::orderby('id', 'desc')->get());
        if($result==true){
            return $result;
        }else{
            return 0;
        }
   }

    public function customDateCost(Request $req){
       $created =  $req->input('getCustomDate');
       $category = $req->input('category');
       if($category != ""){
            $result = DB::table('table_cost')
            ->where('created', 'LIKE', "%{$created}%")
            ->where('event', 'LIKE', "%{$category}%")
            ->get();
            
            return $result;
       }else{
          //$result = DB::table('table_cost')->where('created','like',"{$created}%")->get();
            $result = DB::table('table_cost')->where('created','like',"{$created}%")->get();
            return $result;
       }
       
       
    }
}
