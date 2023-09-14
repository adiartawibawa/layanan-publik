<?php

namespace App\Http\Livewire\Panduan;

use App\Models\Panduan;
use Livewire\Component;
use Livewire\WithFileUploads;

class PanduanAplikasi extends Component
{
    use WithFileUploads;

    public $panduans;
    public $title, $content, $image, $document, $step;
    public $panduanId;

    public function save()
    {
        $params = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'step' => 'required',
            'document' => 'max:2048' // PDF dengan maksimum ukuran 2MB
        ]);

        if ($this->panduanId == "") {

            $panduan = Panduan::create([
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
        $this->step = '';
    }

    public function getPanduan()
    {
        $this->panduans = Panduan::all();

        return $this->panduans;
    }

    public function render()
    {
        return view('livewire.panduan.panduan-aplikasi', [
            'panduans' => $this->getPanduan(),
        ]);
    }
}
