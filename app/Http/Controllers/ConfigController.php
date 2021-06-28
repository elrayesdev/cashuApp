<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigController extends Controller
{
    //
    public function index(){
        $configs = Auth::user()->customer->configs()->paginate(5);
        return view('configs.showAll',compact(['configs']));
    }

    public function edit($id){
        $config = Config::findOrFail($id);
        return view('configs.edit', compact(['config']));
    }

    public function update($id, Request $request){
        $config = Config::findOrFail($id);

        $request->validate([
            'target' => 'required|numeric|between:0,999999.99',
        ]);

        $config->update([
            'target'=>$request->target,
        ]);

        return redirect('/configs');
    }
}
