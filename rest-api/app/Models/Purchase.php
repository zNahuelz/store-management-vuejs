<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'supplier_id',
        'store_id',
        'total',
        'voucher_type',
    ];
    
    public function purchaseDetail(): BelongsTo
    {
        return $this->belongsTo(PurchaseDetail::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
    
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
