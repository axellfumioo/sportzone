<?php
namespace App\Http\Controllers;

use App\Models\SportsList;

class SportsController extends Controller
{
    public function view($sports)
    {
        $sport = SportsList::with('arenas')
            ->where('sports_name', $sports)
            ->first();

        if (! $sport) {
            return redirect('/')
                ->with('error', 'Sport not found.');
        }

        return view('sports.index', [
            'sport'  => $sport,
            'arenas' => $sport->arenas,
        ]);
    }
}
