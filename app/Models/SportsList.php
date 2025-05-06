<?php
namespace App\Models;

use App\Models\Arena;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SportsList extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'sports_name',
        'sports_description',
    ];

    public function arenas()
    {
        return $this->hasMany(Arena::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'sports_id');
    }

}
