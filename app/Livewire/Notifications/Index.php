<?php

namespace App\Livewire\Notifications;

use Illuminate\Notifications\Events\NotificationSent;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public $notifications;

    public $unread;

    #[On('notificationReceived')]
    public function mount()
    {
        $this->notifications = auth()->user()->notifications()->get();
        $this->unread = auth()->user()->notifications()->unread()->get();
    }

    #[Title('Notifications')]
    public function render()
    {
        return view('livewire.notifications.index')->layout('layouts.app');
    }

    public function markAsRead($notificationId)
    {
        auth()->user()->notifications()->where('id', $notificationId)->update(['read_at' => now()]);
        $this->mount();
    }

    public function delete($notificationId)
    {
        auth()->user()->notifications()->where('id', $notificationId)->delete();
        $this->mount();
    }
}
