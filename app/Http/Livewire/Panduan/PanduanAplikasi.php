<?php

namespace App\Http\Livewire\Panduan;

use App\Models\Panduan;
use Livewire\Component;
use Livewire\WithFileUploads;

class PanduanAplikasi extends Component
{
    use WithFileUploads;

    public $categories;
    public $selectedCategory = null;
    public $headerCard;
    public $panduans = [];
    public $step = 0;
    public $title, $content;
    public $image, $document = null;
    public $panduanId;

    public function mount($categories)
    {
        $this->categories = $categories;
    }

    public function updatedSelectedCategory()
    {
        switch ($this->selectedCategory) {
            case 'register':
                $this->headerCard = 'Register';
                break;
            case 'ambil_berkas':
                $this->headerCard = 'Pengambilan Berkas';
                break;
            case 'ajuan_mohon':
                $this->headerCard = 'Pengajuan Permohonan';
                break;
            default:
                $this->headerCard = '';
                break;
        }

        $this->getPanduan($this->selectedCategory);

        $this->countLastStep($this->selectedCategory);
    }

    public function countLastStep($selectedCategory)
    {
        $step = Panduan::where('jenis', $selectedCategory)->latest()->first();

        $this->step = ($step != null) ? ++$step->step : 1;
    }

    public function save()
    {
        $params = $this->validate([
            'selectedCategory' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'step' => 'required',
            'document' => 'max:2048' // PDF dengan maksimum ukuran 2MB
        ]);

        if ($this->panduanId == "") {

            $panduan = Panduan::create([
                'jenis' => $this->selectedCategory,
                'title' => $params['title'],
                'content' => $params['content'],
                'step' => $params['step'],
            ]);

            if ($params['document'] != "") {
                $panduan->file = $this->uploadFile($panduan, $params['document'], 'document');
            }

            $panduan->image = $this->uploadFile($panduan, $params['image'], 'images');

            $panduan->save();

            session()->flash('message', 'Panduan berhasil ditambahkan.');
        } else {
            $this->update($this->panduanId, $params);
        }

        $this->resetForm();
        $this->updatedSelectedCategory();
    }

    private function uploadFile($panduan, $media, $collection)
    {
        $panduan->clearMediaCollection($collection);
        $panduan->addMedia($media)->toMediaCollection($collection);

        return $panduan->getFirstMedia($collection)->getUrl();
    }

    public function update($id, $params)
    {
        $panduan = Panduan::findOrFail($id);
        $panduan->jenis = $this->selectedCategory;
        $panduan->title = $params['title'];
        $panduan->content = $params['content'];
        $panduan->step = $params['step'];

        $panduan->save();
    }

    private function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->image = null;
        $this->document = null;
        $this->step = ++$this->step;
    }

    public function getPanduan($jenis)
    {
        $this->panduans = Panduan::where('jenis', $jenis)->get();

        return $this->panduans;
    }

    public function render()
    {
        return view('livewire.panduan.panduan-aplikasi');
    }
}
