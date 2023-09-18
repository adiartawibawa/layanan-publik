<?php

namespace App\Http\Livewire\Stats;

use App\Models\Permohonan;
use Livewire\Component;

class PermohonanStats extends Component
{
    public function permohonanMasuk()
    {

        $permohonan = Permohonan::count();

        return $permohonan;
    }

    public function render()
    {
        return view('livewire.stats.permohonan-stats', [
            'permohonan' => $this->permohonanMasuk()
        ]);
    }
}
