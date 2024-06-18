<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWallet extends Model
{
    use HasFactory;

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function wallets(): BelongsToMany {
        return $this->belongsToMany(Wallet::class);
    }

    public function eWalletTransactions(): HasMany {
        return $this->hasMany(EwalletTransaction::class);
    }
}