<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ketentuan;
use App\Models\Layanan;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();

        return view('admin.layanan.index', compact('layanans'));
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

    public function getDetailLayanan($id)
    {
        $detailLayanan = Layanan::whereId($id)->with('ketentuans')->get();

        return view('admin.layanan.partials.add-detail-layanan')->with('layanan', $detailLayanan);
    }

    public function addDetailLayanan(Layanan $layanan, Request $request)
    {

        $ketentuan = Ketentuan::create([
            'name' => $request->get('name'),
            'desc' => $request->get('desc'),
            'category' => $request->get('category'),
            'type' => $request->get('type'),
            'is_required' => $request->get('is_required') == 'on' ? 1 : 0,
            'ketentuan_id' => $layanan->id,
            'ketentuan_type' => Layanan::class,
        ]);

        return redirect()->back();
    }

    public function deleteDetailLayanan(Request $request)
    {
        $ketentuan = Ketentuan::findOrFail($request->ketentuan);
        $ketentuan->delete();

        return redirect()->back();
    }
}
