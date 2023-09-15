<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    public function index()
    {
        $categories = collect([
            ['name' => 'register', 'label' => 'Panduan Register'],
            ['name' => 'ambil_berkas', 'label' => 'Panduan Pengambilan Berkas'],
            ['name' => 'ajuan_mohon', 'label' => 'Panduan Pengajuan Permohonan']
        ]);

        return view('admin.panduan.index', compact('categories'));
    }
}
