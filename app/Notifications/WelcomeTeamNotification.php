<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeTeamNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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


        // return (new MailMessage)->view('emails.welcome', ['user' => $this->user]);
        return (new MailMessage)
                    ->greeting('Hello, ' . ucfirst($notifiable->name))
                    ->line('Thanks for signing up. Your login information is given below. please reset your password once your login by using the given cridential.')
                    ->line('E-mail:' . $notifiable->email)
                    ->line('Password:' . $this->data)
                    ->action('Login', url('/login'))
                    ->line('Please bookmark the login link and add this email to your address book.');
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
