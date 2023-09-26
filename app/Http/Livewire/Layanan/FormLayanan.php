<?php

namespace App\Http\Livewire\Layanan;

use App\Models\Layanan;
use LivewireUI\Modal\ModalComponent;

class FormLayanan extends ModalComponent
{
    public $updateLayanan = false;
    public $name, $desc, $estimasi;

    public Layanan $layanan;

    protected $rules = [
        'name' => 'required',
        'desc' => 'required',
        'estimasi' => 'required',
    ];

    public function mount()
    {
        if (!empty($this->layanan)) {
            $this->updateLayanan = true;
            $this->name = $this->layanan->name;
            $this->desc = $this->layanan->desc;
            $this->estimasi = $this->layanan->estimasi;
        }
    }

    public function render()
    {
        return view('livewire.layanan.form-layanan');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->desc = '';
        $this->estimasi = '';
    }

    public function store()
    {
        $this->validate();
        try {
            Layanan::create([
                'name' => $this->name,
                'estimasi' => $this->estimasi,
                'desc' => $this->desc,
            ]);

            session()->flash('success', 'Layanan Created Successfully!!');

            $this->resetFields();

            $this->closeModal();

            return redirect()->route('admin.layanan.index');
        } catch (\Exception $e) {

            session()->flash('error', 'Something goes wrong while creating layanan!!');
            $this->resetFields();
        }
    }

    public function cancel()
    {
        $this->updateLayanan = false;
        $this->resetFields();
        $this->closeModal();
    }

    public function update()
    {
        $this->validate();
        try {
            $this->layanan->update([
                'name' => $this->name,
                'estimasi' => $this->estimasi,
                'desc' => $this->desc,
            ]);

            session()->flash('success', 'Layanan Updated Successfully!!');

            $this->cancel();

            return redirect()->route('admin.layanan.index');
        } catch (\Exception $e) {

            session()->flash('error', 'Something goes wrong while updating layanan!!');

            $this->cancel();
        }
    }
}
