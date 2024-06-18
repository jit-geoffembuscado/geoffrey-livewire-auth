<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function productCategories(): HasMany {
        return $this->hasMany(ProductCategory::class);
    }

    public function transactionProducts(): HasMany {
        return $this->hasMany(TransactionProduct::class);
    }

    public function machineProducts(): HasMany {
        return $this->hasMany(MachineProduct::class);
    }
}