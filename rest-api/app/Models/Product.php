<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'code',
        'code_value',
        'name',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function purchaseDetail(): BelongsToMany
    {
        return $this->belongsToMany(PurchaseDetail::class);
    }

    public function saleDetail(): BelongsToMany
    {
        return $this->belongsToMany(SaleDetail::class);
    }

    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(
            Store::class,
            'product_stores',
            'product_id',
            'store_id');
    }


}
