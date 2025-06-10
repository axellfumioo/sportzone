<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class AIRateLimit extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'ip',
        'total_request',
        'expired',
    ];
}
