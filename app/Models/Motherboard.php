<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'chipset',
        'socket',
        'form_factor',
        'memory_type',
        'memory_slots',
        'max_memory',
    ];
}
