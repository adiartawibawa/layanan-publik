<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function panduanMohon()
    {
        $panduanMohons = Panduan::all();

        return view('page.panduan-permohonan', compact('panduanMohons'));
    }

    public function panduanAmbilBerkas()
    {
        $panduanAmbilBerkas = Panduan::all();

        return view('page.panduan-ambil-berkas', compact('panduanAmbilBerkas'));
    }
}
