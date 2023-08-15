<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        $permohonans = Permohonan::all();

        return view('admin.layanan.index', compact('layanans', 'permohonans'));
    }

    public function store(Request $request)
    {
        Layanan::create([
            'name' => $request->name,
            'estimasi' => $request->estimasi,
            'desc' => $request->desc,
        ]);
        return Redirect::route('admin.pelayanan');
    }

    public function getDetailLayanan(Layanan $layanan)
    {
        $detailLayanan = $layanan;

        return view('admin.layanan.partials.add-detail-layanan')->with('layanan', $detailLayanan);
    }
}
