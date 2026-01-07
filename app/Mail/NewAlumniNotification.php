<?php

namespace App\Mail;

use App\Models\Alumni;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAlumniNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $alumni;

    /**
     * Create a new message instance.
     */
    public function __construct(Alumni $alumni)
    {
        $this->alumni = $alumni;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Alumni Added')
                    ->view('emails.new_alumni_notification');
    }
}
