<?php

namespace App\Http\Livewire\Permohonan;

use App\Models\Permohonan;
use App\Models\StatusPermohonan;
use Livewire\Component;

class Riwayat extends Component
{
    public $kodePermohonan;

    public function mount($kodePermohonan)
    {
        $this->kodePermohonan = $kodePermohonan;
    }

    public function detailPermohonan($kodePermohonan)
    {
        $details = Permohonan::where('kode_mohon', $kodePermohonan)->with('statuses')->get();

        return $details;
    }

    // public function getPermohonan($kodePermohonan)
    // {
    //     $permohonan = Permohonan::where('kode_mohon', $kodePermohonan)->first();

    //     return $permohonan->id;
    // }

    // public function statusPermohonan($kodePermohonan)
    // {
    //     $idPermohonan = $this->getPermohonan($kodePermohonan);

    //     $status =  StatusPermohonan::wherePermohonanId($idPermohonan)->latest()->get();

    //     return $status;
    // }

    public function render()
    {
        return view('livewire.permohonan.riwayat', [
            'details' => $this->detailPermohonan($this->kodePermohonan)
        ]);
    }
}
