<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\SportsList; // ✅ HARUS huruf besar "App"

class Arena extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'arena_name',
        'arena_description',
        'arena_rating',
        'arena_reviews',
        'arena_opening_hours',
        'arena_closing_hours',
        'arena_address',
        'arena_price',
        'arena_price_range',
        'selection_type',
        'selections',
    ];

    public function sportsList()
    {
        return $this->belongsTo(SportsList::class);
    }
}
