<?php

namespace App\Http\Controllers;

use App\Models\DetailPermohonan;
use App\Models\Ketentuan;
use App\Models\Layanan;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            $query->where('category', '=', 'prasyarat');
        })->get();

        $this->data['formulir'] = Ketentuan::whereHasMorph('ketentuan', [Layanan::class], function ($query) {
            $query->where('category', '=', 'formulir');
        })->get();

        return view('permohonan.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Layanan $layanan)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->except('_token');

        $tambahPermohonan = true;
        $permohonanKeys = Ketentuan::whereIn('key', array_keys($params))->get()->pluck('key')->toArray();

        if ($params) {
            foreach ($params as $permohonanKey => $permohonanValue) {
                if (in_array($permohonanKey, $permohonanKeys) && !$this->savePermohonan($permohonanKey, $permohonanValue)) {
                    $tambahPermohonan = false;
                    break;
                }
            }
        }
    }

    private function savePermohonan($permohonanKey, $permohonanValue)
    {
        $ketentuan = Ketentuan::where('key', $permohonanKey)->first();

        if (!$ketentuan) {
            return;
        }

        if ($ketentuan->type == 'file' && $permohonanValue) {
            $permohonanValue = $this->uploadFile($ketentuan, $permohonanValue);
        }
        $permohonan = Permohonan::create([
            'layanan_id' => $ketentuan->ketentuan_id,
            'user_id' => Auth::user()->id,
            'kode_mohon' => Str::random(8)
        ]);

        $detail = new DetailPermohonan;
        $detail->permohonan_id = $permohonan->id;
        $detail->mohon_type = $ketentuan->type;
        $detail->mohon_key = $ketentuan->key;
        $detail->name = $ketentuan->name;
        $detail[$detail->type . '_value'] = $permohonanValue;

        return $detail->save();
    }

    private function uploadFile($permohonan, $permohonanValue)
    {
        $permohonan->clearMediaCollection('images');
        $permohonan->addMediaFromRequest($permohonan->mohon_key)->toMediaCollection('images');

        return $permohonan->getFirstMedia('images')->getUrl();
    }

    /**
     * Display the specified resource.
     */
    public function show($layanan)
    {
        $layanan = Layanan::findOrFail($layanan);
        return view('permohonan.create', compact('layanan'));
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
