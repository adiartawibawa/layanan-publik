<?php

namespace App\Http\Livewire\Permohonan;

use App\Models\Permohonan;
use App\Models\StatusPermohonan;
use App\Models\User;
use App\Notifications\PermohonanLayananUpdate;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class PermohonanMasuk extends Component
{
    public $permohonan;
    public $user;

    public function mount($permohonan)
    {
        $this->permohonan = Permohonan::find($permohonan);
        $this->user = User::find($this->permohonan->user_id);
    }

    public function isValid($params)
    {
        $permohonanLayanan = $this->permohonan;

        $status = new StatusPermohonan;
        $status->permohonan_id = $permohonanLayanan->id;

        if ($params == true) {
            $status->aktivitas = 1;
            $status->keterangan = 'Permohonan layanan telah diterima';
            $permohonanLayanan->is_valid = true;
        } else {
            $status->aktivitas = 3;
            $status->keterangan = 'Permohonan layanan telah dibatalkan karena data tidak valid';
            $permohonanLayanan->is_valid = false;
        }

        $status->save();
        $permohonanLayanan->save();

        Notification::send($this->user, new PermohonanLayananUpdate($permohonanLayanan));

        if ($status->aktivitas == 3) {
            return redirect()->route('admin.pelayanan');
        }
    }

    public function proses()
    {
        $permohonanLayanan = $this->permohonan;

        StatusPermohonan::create([
            'permohonan_id' => $permohonanLayanan->id,
            'aktivitas' => 2,
            'keterangan' => 'Permohonan layanan telah diproses',
        ]);


        Notification::send($this->user, new PermohonanLayananUpdate($permohonanLayanan));

        return redirect()->route('admin.pelayanan');
    }

    public function render()
    {
        return view('livewire.permohonan.permohonan-masuk');
    }
}
