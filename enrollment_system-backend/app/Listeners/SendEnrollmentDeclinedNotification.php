<?php

namespace App\Listeners;

use App\Events\EnrollmentDeclined;
use Illuminate\Support\Facades\Log;

class SendEnrollmentDeclinedNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\EnrollmentDeclined  $event
     * @return void
     */
    public function handle(EnrollmentDeclined $event)
    {
        // Log the student number and message
        Log::info('Enrollment Declined Event Received', [
            'student_number' => $event->studentNumber,
            'message' => $event->message,
        ]);

        // Example: You can send an email or other notifications here
        // Mail::to($student->email)->send(new EnrollmentDeclinedMail($event->studentNumber, $event->message));
    }
}

