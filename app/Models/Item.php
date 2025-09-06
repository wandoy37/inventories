<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            // Ambil 2 huruf awal nama
            $prefix = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $item->name), 0, 2));

            // Ambil ID terakhir dan random 2 digit
            $lastId = self::max('id') ?? 0;
            $nextId = $lastId + 1;
            $random = random_int(10, 99);

            $code = $prefix . str_pad($nextId, 2, '0', STR_PAD_LEFT) . $random;

            // Pastikan kode unik
            while (self::where('code', $code)->exists()) {
                $random = random_int(10, 99);
                $code = $prefix . str_pad($nextId, 2, '0', STR_PAD_LEFT) . $random;
            }

            $item->code = $code;
        });
    }

    public function units(): HasMany
    {
        return $this->hasMany(ItemUnitType::class);
    }
}
