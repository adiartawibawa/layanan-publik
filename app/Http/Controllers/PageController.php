<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function panduanMohon()
    {
        $panduanMohons = Panduan::where('jenis', 'ajuan_mohon')->get();

        return view('page.panduan-permohonan', compact('panduanMohons'));
    }

    public function panduanAmbilBerkas()
    {
        $panduanAmbilBerkas = Panduan::where('jenis', 'ambil_berkas')->get();

        return view('page.panduan-ambil-berkas', compact('panduanAmbilBerkas'));
    }

    public function panduanRegistrasi()
    {
        $panduanRegistrasis = Panduan::where('jenis', 'register')->get();

        return view('page.panduan-registrasi', compact('panduanRegistrasis'));
    }
}
