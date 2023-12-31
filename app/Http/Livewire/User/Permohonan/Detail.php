<?php

namespace App\Http\Livewire\User\Permohonan;

use App\Models\StatusPermohonan;
use Livewire\Component;

class Detail extends Component
{
    public $permohonan;

    public $riwayat;

    protected $listeners = ['detailMohon'];

    public function detailMohon($id)
    {
        $statusMohon = StatusPermohonan::wherePermohonanId($id)->latest()->get();

        $this->riwayat = $statusMohon;
    }

    public function mount($permohonan)
    {
        $this->permohonan = $permohonan;

        $this->detailMohon($this->permohonan);
    }

    public function render()
    {
        return view('livewire.user.permohonan.detail');
    }
}
