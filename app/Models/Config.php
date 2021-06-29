<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $table = 'config';

    protected $fillable = [
        'target',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
