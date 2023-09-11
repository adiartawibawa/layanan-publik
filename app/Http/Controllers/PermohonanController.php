<?php

namespace App\Http\Controllers;

use App\Models\DetailPermohonan;
use App\Models\Ketentuan;
use App\Models\Layanan;
use App\Models\Permohonan;
use App\Models\StatusPermohonan;
use App\Notifications\PermohonanLayananUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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

        $savePermohonan = true;

        if ($params) {

            $permohonan = Permohonan::create([
                'layanan_id' => $request->layanan_id,
                'user_id' => Auth::user()->id,
                'kode_mohon' => Str::random(8)
            ]);

            $permohonanKeys = Ketentuan::whereIn('key', array_keys($params))->get()->pluck('key')->toArray();

            foreach ($params as $permohonanKey => $permohonanValue) {
                if (in_array($permohonanKey, $permohonanKeys) && !$this->savePermohonan($permohonan, $permohonanKey, $permohonanValue)) {
                    $savePermohonan = false;
                    break;
                }
            }
        }

        if ($savePermohonan) {

            StatusPermohonan::create([
                'permohonan_id' => $permohonan->id,
                'aktivitas' => 0,
                'keterangan' => 'Permohonan layanan telah dibuat',
            ]);

            // Notification
            Notification::send(Auth::user(), new PermohonanLayananUpdate($permohonan));

            return redirect('dashboard')->with('success', 'Permohonan telah dikirim');
        }

        return redirect('dashboard')->with('error', 'Permohonan tidak dapat dikirim');
    }

    private function savePermohonan($permohonan, $permohonanKey, $permohonanValue)
    {
        $ketentuan = Ketentuan::where('key', $permohonanKey)->first();

        if (!$ketentuan) {
            return;
        }

        $detail = new DetailPermohonan;
        $detail->permohonan_id = $permohonan->id;
        $detail->category = $ketentuan->category;
        $detail->mohon_type = $ketentuan->type;
        $detail->mohon_key = $ketentuan->key;
        $detail->name = $ketentuan->name;
        $detail->save();

        if ($ketentuan->type == 'file' && $permohonanValue) {
            $permohonanValue = $this->uploadFile($detail, $permohonanValue);
        }

        $detail[$ketentuan->type . '_value'] = $permohonanValue;

        return $detail->save();
    }

    private function uploadFile($detail, $permohonanValue)
    {
        $detail->clearMediaCollection('images');
        $detail->addMediaFromRequest($detail->mohon_key)->toMediaCollection('images');

        return $detail->getFirstMedia('images')->getUrl();
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
