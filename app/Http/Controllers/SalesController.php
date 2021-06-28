<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    //
    public function index(){
        $sales = Auth::user()->customer->sales()->paginate(5);
        return view('sales.showAll',compact(['sales']));
    }
    public function create(){
        $users = Auth::user()->customer->users;
        return view('sales.create',compact(['users']));
    }
    public function store(Request $request){

        $request->validate([
            'user' => 'required|exists:App\Models\User,id',
            'payment' => 'required|numeric|between:0,999999.99',
        ]);
        $sales = Sales::create(
            [
                'user_id'=>$request->user,
                'payment'=>$request->payment,
            ]
        );
        return redirect('sales');
//        $users = Auth::user()->customer->users;
//        return view('sales.create',compact(['users']));
    }
}
