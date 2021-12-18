<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costEvent_Model;
use App\Models\costModel;
use App\Models\Lenging_Model;
use Illuminate\Support\Facades\DB;

class LendingController extends Controller
{
    public function index(){
        $events = json_decode(costEvent_Model::orderby('id', 'desc')->get());
        $eve = json_decode(costEvent_Model::orderby('id', 'desc')->get());
        return view('componant.lending', ['events'=>$events, 'eve'=>$eve ]);
    }

    public function Lending_add_method(Request $req){
        $costName = $req->input('costName');
        $amount = $req->input('amount');

        $result  = Lenging_Model::insert(['name'=>$costName, 'amount'=>$amount]);

       if($result == true){
           return 1;
       }else{
           return 0;
       }
    } 

    public function getAllLending(){
        $result = json_decode(Lenging_Model::orderby('id', 'desc')->get());
        if($result==true){
            return $result;
        }else{
            return 0;
        }
   }

   public function selectEditData(Request $req){
    $id = $req->input('editid');
    $result =  json_encode(Lenging_Model::where('id', '=', $id)->get()); 
    return $result;
   }
}
