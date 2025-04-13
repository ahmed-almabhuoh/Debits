<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disbursement extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'description', 'disbursement_date', 'payment_method', 'reference_number',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'disbursement_date' => 'date',
        'payment_method' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
