<?php

namespace App\Http\Livewire\Root\User;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
{
    public $selectedId;
    public $user;

    protected $listeners = ['selectedId'];

    public function render()
    {
        return view('livewire.root.user.edit-user');
    }

    public function selectedId($id)
    {
        $this->selectedId = $id;

        $this->user = User::whereId($this->selectedId)->get();
    }
}
