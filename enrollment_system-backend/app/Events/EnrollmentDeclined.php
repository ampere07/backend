<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnrollmentDeclined implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $studentNumber;
    public $message;

    public function __construct($studentNumber, $message)
    {
        $this->studentNumber = $studentNumber;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('student.' . $this->studentNumber);  // Channel for the student
    }

    public function broadcastWith()
    {
        return [
            'student_number' => $this->studentNumber,
            'message' => $this->message
        ];
    }
}


