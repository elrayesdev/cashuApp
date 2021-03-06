<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $with = ['roles'];

    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'customer_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'privilege');
    }

    public  function sales(){
        return $this->hasMany(Sales::class);
    }

    public  function configs(){
        return $this->hasMany(Config::class);
    }

    public function is($roleCode)
    {
        if ($this->isSuper()){
            return true;
        }
        foreach ($this->roles()->get() as $role)
        {
            if ($role->code == $roleCode)
            {
                return true;
            }
        }
        return false;
    }

    public function isSuper(){
        foreach ($this->roles()->get() as $role)
        {
            if ($role->code == 'SUPER')
            {
                return true;
            }
        }
        return false;
    }

    public function isAdmin(){
        return $this->is('ADMIN');
    }

    public function isBack(){
        if ($this->isAdmin())
            return true;
        return $this->is('BACK');
    }

    public function isSales(){
        if ($this->isAdmin())
            return true;
        return $this->is('SALES');
    }
}
