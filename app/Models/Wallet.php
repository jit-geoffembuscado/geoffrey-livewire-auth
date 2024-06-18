<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Wallet extends Model
{
    use HasFactory;

    public function userWallets(): HasMany {
        return $this->hasMany(UserWallet::class);
    }

    public function convertionRate(): HasOne {
        return $this->hasOne(ConversionRate::class);
    }
}