<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ConversionRate extends Model
{
    use HasFactory;

    public function wallet() : HasOne {
        return $this->hasOne(Wallet::class);
    }
}