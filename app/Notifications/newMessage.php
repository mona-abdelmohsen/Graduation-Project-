<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newMessage extends Notification
{
    use Queueable;
    public $message_id, $sender_id, $message, $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($message_id, $sender_id, $message, $type)
    {
        $this->message_id = $message_id;
        $this->sender_id = $sender_id;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message_id'=>$this->message_id,
            'sender_id'=>$this->sender_id,
            'message'=>$this->message,
            'type'=>$this->type
        ];
    }
}
