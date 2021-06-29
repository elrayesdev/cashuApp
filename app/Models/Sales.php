<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $table = 'sales';

    protected $fillable = [
        'payment',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
