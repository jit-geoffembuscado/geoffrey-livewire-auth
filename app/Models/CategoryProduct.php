<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryProduct extends Model
{
    use HasFactory;

    public function product() : BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function productCategories() : BelongsTo {
        return $this->belongsTo(ProductCategory::class);
    }
}