<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $event;

    public function __construct($user, $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    public function build()
    {
        return $this->view('emails.reminder')
            ->with([
                'userName' => $this->user->name,
                'eventTitle' => $this->event->title,
                'eventDescription' => $this->event->description,
                'eventStartDate' => $this->event->start_date,
            ]);
    }
}