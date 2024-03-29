<?php

namespace App\Notifications;

use App\WasteSilo;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class WasteSiloFull extends Notification
{
    use Queueable;

    protected $wastesilo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(WasteSilo $wastesilo)
    {
        $this->wastesilo = $wastesilo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/wastesilos');

        return (new MailMessage)
            ->error()
            ->subject('Waste silo ' . $this->wastesilo->name . ' is ' . $this->wastesilo->capacity * 100 .'% full')
            ->greeting('Hi ' . Auth::user()->name)
            ->line('Waste silo ' . $this->wastesilo->name . ' is ' . $this->wastesilo->capacity * 100 .'% full!')
            ->action('View ' . $this->wastesilo->name, $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
