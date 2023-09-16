<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function checkPermohonan(Request $request)
    {
        $kodePermohonan = $request->kode;

        return view('page.check-permohonan', compact('kodePermohonan'));
    }

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
