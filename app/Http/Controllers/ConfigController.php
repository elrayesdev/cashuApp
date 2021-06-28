<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    //
    public function index(){
        $configs = Auth::user()->customer->configs()->paginate(5);
        return view('configs.showAll',compact(['configs']));
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }
}
