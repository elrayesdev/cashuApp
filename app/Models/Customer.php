<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name',
        'website',
    ];

    public function users(){
        return $this->hasMany(User::class, 'customer_id');
    }

}