<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $users = Auth::user()->customer->users()->paginate(5);
        return view('users.showAll',compact(['users']));
    }

    public function create(){
        return null;
    }

    public function store(){

    }
}
