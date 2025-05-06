<?php
namespace App\Http\Controllers;

use App\Models\Promo;

class PromoController extends Controller
{
    public function view()
    {
        $promos = Promo::all();

        return view('promotion.index', compact('promos'));
    }
}
