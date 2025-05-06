<?php
namespace App\Http\Controllers;

use App\Models\Arena;

class BookController extends Controller
{
    public function view($slug)
    {
        $arenas = Arena::where('arena_slugs', $slug)->first();
        if (! $arenas) {
            return redirect('/');
        }

        return view('book.index', compact('arenas'));
    }
}
