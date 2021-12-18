<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costEvent_Model;
use App\Models\costModel;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function Auth(){
        return view('Auth');
    }
}
