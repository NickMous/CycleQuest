<?php

namespace App\Livewire\Notifications;

use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $notifications;

    public function getListeners()
    {
        return [
            "echo-private:App.Models.User." . auth()->user()->id . ",NotificationCreated" => 'mount',
        ];
    }

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
    }

    public function render()
    {
        return view('livewire.notifications.index')->layout('layouts.app');
    }
}
