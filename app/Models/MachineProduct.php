<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MachineProduct extends Model
{
    use HasFactory;

    public function product() : BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function machine() : BelongsTo {
        return $this->belongsTo(Machine::class);
    }
}