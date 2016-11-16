<?php

namespace App\Notifications;

use App\PrimeSilo;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class PrimeSiloFull extends Notification
{
    use Queueable;

    protected $primesilo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PrimeSilo $primesilo)
    {
        $this->primesilo = $primesilo;
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
        $url = url('/primesilos');

        return (new MailMessage)
            ->error()
            ->subject('Prime silo ' . $this->primesilo->name . ' is ' . $this->primesilo->capacity * 100 .'% full')
            ->greeting('Hi ' . Auth::user()->name)
            ->line('Prime silo ' . $this->primesilo->name . ' is ' . $this->primesilo->capacity * 100 .'% full!')
            ->action('View ' . $this->primesilo->name, $url);
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
