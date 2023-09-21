<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'user_id',
        'user_device',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
