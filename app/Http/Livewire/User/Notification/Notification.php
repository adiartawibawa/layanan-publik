<?php

namespace App\Http\Livewire\User\Notification;

use Livewire\Component;

class Notification extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.notification.notification');
    }
}
