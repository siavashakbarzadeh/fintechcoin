<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'subject',
        'from_name',
        'reply_to_email',
        'message',
        'sent_at',
        'canceled_at',
    ];

    protected $casts=[
        'sent_at'=>'datetime',
        'canceled_at'=>'datetime',
    ];

    public function users()
    {
        return $this->morphedByMany(User::class,'emailable');
    }
}
