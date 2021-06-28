<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    //
    public function index(){
        $sales = Auth::user()->customer->sales()->paginate(5);
        return view('sales.showAll',compact(['sales']));
    }
}
