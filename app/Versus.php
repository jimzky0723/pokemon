<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versus extends Model
{
    protected $table = 'versuses';
    protected $fillable = [
        'id',
        'attacker',
        'defender',
        'damage'
    ];
}
