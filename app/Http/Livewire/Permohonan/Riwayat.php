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

    public function render()
    {
        return view('livewire.permohonan.riwayat', [
            'details' => $this->detailPermohonan($this->kodePermohonan)
        ]);
    }
}
