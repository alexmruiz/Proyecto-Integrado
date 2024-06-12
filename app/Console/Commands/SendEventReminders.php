<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

class SendEventReminders extends Command
{
    protected $signature = 'send:event-reminders';
    protected $description = 'Send event reminders to users for events starting within an hour';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Log::info('SendEventReminders command started');

        $currentTime = now();
        $futureTime = now()->addHour();

        Log::info('Current time: ' . $currentTime);
        Log::info('Future time: ' . $futureTime);

        $events = Event::where('start_date', '>', $currentTime)
            ->where('start_date', '<=', $futureTime)
            ->get();

        Log::info('Found ' . $events->count() . ' events');

        foreach ($events as $event) {
            $user = $event->user;
            if ($user) {
                Log::info('Sending reminder to user: ' . $user->email . ' for event: ' . $event->title);
                Mail::to($user->email)->send(new ReminderEmail($user, $event));
            } else {
                Log::warning('No user associated with event ID: ' . $event->id);
            }
        }

        Log::info('SendEventReminders command finished');
    }
}