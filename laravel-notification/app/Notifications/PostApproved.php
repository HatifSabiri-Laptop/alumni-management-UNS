<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Post;

class PostApproved extends Notification
{
    use Queueable;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your post has been approved!')
            ->line('Congratulations! Your post "' . $this->post->title . '" has been approved.')
            ->action('View Post', url('/posts/' . $this->post->id));
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->post->title,
            'message' => 'Your post has been approved!',
        ];
    }
}
