<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'country',
        'city',
        'amount',
        'payment_way',
        'status',
        'mention_my_name',
        'payment_id',
    ];
}
