<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the menu that owns the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['date'] ?? false, fn ($query, $date) =>
            $query->whereBetween('date', [$date['from'], $date['to']])
        );
    }
}
