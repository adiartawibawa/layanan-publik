<?php

namespace App\Http\Livewire\User\Permohonan;

use App\Models\Permohonan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Layanan extends Component
{
    public $permohonans;

    public $detailMohon;

    public function latestPermohonan()
    {
        $this->permohonans = Permohonan::select('permohonan.*', 'layanan.name as layanan_name', 'status_permohonan.aktivitas as status_aktivitas')
            ->leftJoin('layanan', 'permohonan.layanan_id', '=', 'layanan.id')
            ->leftJoin(DB::raw('(SELECT permohonan_id, MAX(created_at) AS max_created_at FROM status_permohonan GROUP BY permohonan_id) latest_status'), function ($join) {
                $join->on('permohonan.id', '=', 'latest_status.permohonan_id');
            })
            ->leftJoin('status_permohonan', function ($join) {
                $join->on('latest_status.permohonan_id', '=', 'status_permohonan.permohonan_id')
                    ->on('latest_status.max_created_at', '=', 'status_permohonan.created_at');
            })
            ->where('user_id', '=', Auth::user()->id)
            ->latest()
            ->get();

        return $this->permohonans;
    }

    public function detail($id)
    {
        $this->detailMohon = $id;

        $this->emit('detailMohon', $this->detailMohon);
    }

    public function render()
    {
        return view('livewire.user.permohonan.layanan', [
            'permohonans' => $this->latestPermohonan()
        ]);
    }
}
