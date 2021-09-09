<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntegralConfig extends Model
{
    protected $table = 'integral_config';

    protected $fillable = [
        'level', 'amount', 'name',
    ];
}
