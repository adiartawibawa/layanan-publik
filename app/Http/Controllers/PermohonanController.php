<?php

namespace App\Http\Controllers;

use App\Models\Ketentuan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    protected $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['layanans'] = Layanan::get();

        $this->data['syarat'] = Ketentuan::whereHasMorph('ketentuan', [Layanan::class], function ($query) {
            $query->where('type', '=', 'prasyarat');
        })->get();

        $this->data['formulir'] = Ketentuan::whereHasMorph('ketentuan', [Layanan::class], function ($query) {
            $query->where('type', '=', 'formulir');
        })->get();

        return view('permohonan.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permohonan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}