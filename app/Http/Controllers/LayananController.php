<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{

    public function layanan()
    {
        $layanans = Layanan::get();

        return view('page.daftar-layanan', compact('layanans'));
    }
}
