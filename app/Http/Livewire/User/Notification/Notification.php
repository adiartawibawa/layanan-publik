<?php

namespace App\Http\Livewire\User\Notification;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $user;
    public $count = 0;
    public $unreadNotifications;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.notification.notification');
    }

    public function increment()
    {
        $this->count++;
    }

    public function unreadCount()
    {
        $getUnreadCount = Auth::user()->unreadNotifications->count();

        $this->unreadNotifications = $getUnreadCount;
    }
}
