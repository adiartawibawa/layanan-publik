<?php

namespace App\Http\Controllers;

use App\Models\Ketentuan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    protected $data = [];

    public function layanan()
    {
        $this->data['layanans'] = Layanan::get();

        $this->data['syarat'] = Ketentuan::whereHasMorph('ketentuan', [Layanan::class], function ($query) {
            $query->where('type', '=', 'prasyarat');
        })->get();

        $this->data['formulir'] = Ketentuan::whereHasMorph('ketentuan', [Layanan::class], function ($query) {
            $query->where('type', '=', 'formulir');
        })->get();

        return view('page.daftar-layanan', $this->data);
    }
}
