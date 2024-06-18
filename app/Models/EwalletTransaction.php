<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EwalletTransaction extends Model
{
    use HasFactory;

    public function userWallets() : BelongsTo {
        return $this->belongsTo(UserWallet::class);
    }
}