<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Vendor extends Model
{
    protected $table = 'vendors';
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
    ];

    public function rekenings(): HasMany
    {
        return $this->hasMany(RekeningVendor::class);
    }
}
