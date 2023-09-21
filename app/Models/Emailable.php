<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Emailable extends MorphPivot
{
    protected $casts=[
        'sent_at'=>'datetime',
    ];
}
