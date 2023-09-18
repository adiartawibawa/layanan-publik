<?php

namespace App\Http\Livewire\Stats;

use App\Models\Permohonan;
use Livewire\Component;

class PermohonanProses extends Component
{

    public function getProsesPermohonan()
    {
        $proses = Permohonan::whereHas('statuses', function ($query) {
            $query->where('aktivitas', 1);
            $query->orWhere('aktivitas', 2);
        })->count();

        return $proses;
    }

    public function render()
    {
        return view('livewire.stats.permohonan-proses', [
            'proses' => $this->getProsesPermohonan(),
        ]);
    }
}
