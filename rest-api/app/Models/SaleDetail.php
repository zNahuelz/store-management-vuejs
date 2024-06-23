<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SaleDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sale_id',
        'product_id',
        'amount',
        'unit_price',
        'total_price',
    ];
    
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    
    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
