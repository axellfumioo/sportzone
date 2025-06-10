<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class chatToken extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'token';
    public $incrementing = false; // karena UUID bukan auto-increment
    protected $keyType = 'string'; // karena UUID adalah string

    protected $fillable = [
        'token',
        'messages',
        'return',
    ];

}
