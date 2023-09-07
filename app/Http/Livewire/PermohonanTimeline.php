<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PermohonanTimeline extends Component
{
    public $permohonan;
    protected $listeners = ['updatePermohonan' => 'updatePermohonan'];

    public function updatePermohonan($value)
    {
        // Lakukan pembaruan atau pemrosesan data berdasarkan nilai yang diterima
        $this->permohonan = $value;
    }


    public function mount($permohonan)
    {
        $this->permohonan = $permohonan;
    }

    public function render()
    {
        return view('livewire.permohonan-timeline', [
            $this->permohonan,
        ]);
    }
}
