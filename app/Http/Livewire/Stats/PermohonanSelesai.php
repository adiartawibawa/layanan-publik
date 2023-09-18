<?php

namespace App\Http\Livewire\Stats;

use App\Models\Permohonan;
use Livewire\Component;

class PermohonanSelesai extends Component
{
    public function getSelesaiPermohonan()
    {
        $selesai = Permohonan::whereHas('statuses', function ($query) {
            $query->where('aktivitas', 4);
        })->count();

        return $selesai;
    }

    public function render()
    {
        return view('livewire.stats.permohonan-selesai', [
            'selesai' => $this->getSelesaiPermohonan()
        ]);
    }
}
