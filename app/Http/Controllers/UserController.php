<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //
    public function index(){
        $users = Auth::user()->customer->users()->paginate(5);
        return view('users.showAll',compact(['users']));
    }

    public function create(){
        $roles = Role::all();
        return view('users.create',compact(['roles']));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => 'required|exists:App\Models\Role,id',
        ]);


        $customer = $users = Auth::user()->customer;

        DB::beginTransaction();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'customer_id' => $customer->id,
        ]);
        // this is the customer account creator .. so he is the super admin

        foreach ($request->roles as $role)
        {
            $role = Role::findOrFail($role);
            $user->roles()->save($role);
        }

        $config = Config::create(
            [
                'user_id'=>$user->id,
                'target'=>0,
            ]
        );


        DB::commit();

        event(new Registered($user));


        return redirect('users');
    }
}
