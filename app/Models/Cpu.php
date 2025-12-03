<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'socket',
        'is_unlocked',
        'base_clock',
        'boost_clock',
        'cores',
        'threads',
        'tdp',
    ];
}
