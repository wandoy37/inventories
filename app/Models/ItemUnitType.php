<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemUnitType extends Model
{
    protected $table = 'item_unit_types';
    protected $fillable = [
        'item_id',
        'name',
        'quantitiy',
        'price_buy',
        'price_sell',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
