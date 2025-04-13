<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalDetail extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'date_of_birth', 'gender', 'marital_status', 'nationality'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'gender' => 'string',
        'marital_status' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
