<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class ticket extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'sports_id',
        'qty',
        'validuntil',
    ];
    public function sport()
    {
        return $this->belongsTo(SportsList::class, 'sports_id');
    }
}
