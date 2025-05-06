<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class transaction_history extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'snap_token',
        'amount',
        'due_date',
        'invoice_date',
        'receiver',
        'status',
        'redirect_url',
    ];
    public function sport()
    {
        return $this->belongsTo(SportsList::class, 'sports_id');
    }
}
