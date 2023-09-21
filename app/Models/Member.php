<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_url',
        'full_name',
        'job_title',
        'administration',
        'description',
        'type',
    ];

    public function committees(): BelongsToMany
    {
        return $this->belongsToMany(Committee::class);
    }
}
