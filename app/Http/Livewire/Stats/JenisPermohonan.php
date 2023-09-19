<?php

namespace App\Http\Livewire\Stats;

use App\Models\Layanan;
use App\Models\Permohonan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JenisPermohonan extends Component
{

    public array $dataset = [];
    public array $labels = [];
    public $data = [];

    public function mount()
    {
        $this->labels = $this->getLabels();

        $this->dataset = $this->getLayanan();
    }

    public function render()
    {
        return view('livewire.stats.jenis-permohonan');
    }

    private function getLayanan()
    {
        $layanans = Layanan::select('name', 'id')->get();

        $layanan = [];

        foreach ($layanans as $item) {
            $layanan[] = [
                'label' => $item->name,
                'borderColor' => $this->rand_color(),
                'data' => $this->getData($item->id),
                'fill' => false,
            ];
        }

        return $layanan;
    }

    private function getLabels()
    {
        $labels = [];
        for ($i = 0; $i < 12; $i++) {
            $labels[] = now()->subMonths($i)->format('M');
        }
        return $labels;
    }

    private function getData($layananId)
    {
        $permohonans = Permohonan::whereLayananId($layananId)->monthlyCounts()->toArray();
        $labels = $this->getLabels();
        $data = [];

        foreach ($labels as $label) {
            if (array_key_exists($label, $permohonans)) {
                $data[] = $permohonans[$label];
            } else {
                $data[] = null;
            }
        }

        return $data;
    }

    private function rand_color()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}
