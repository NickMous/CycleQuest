<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $status;

    /**
     * Create a new notification instance.
     */
    public function __construct($status = 'success')
    {
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'view' => [
                'title' => 'Test Notification',
                'message' => 'This is a test notification',
                'url' => 'https://example.com',
                'icon' => 'fas fa-bell',
                'status' => $this->status,
            ],
        ];
    }

    public function toBroadcast(object $notifiable): array
    {
        return [
            'title' => 'Test Notification',
            'message' => 'This is a test notification',
            'url' => 'https://example.com',
            'icon' => 'fas fa-bell',
            'status' => $this->status,
        ];
    }
}
