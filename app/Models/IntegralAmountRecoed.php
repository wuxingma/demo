<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntegralAmountRecoed extends Model
{
    protected $table = 'integral_amount_recoed';

    protected $fillable = [
        'user_id', 'integral_amount', 'date',
    ];
}
