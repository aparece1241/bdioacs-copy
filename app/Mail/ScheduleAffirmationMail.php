<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use App\Models\Schedule;

class ScheduleAffirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $schedule;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->markdown('AffirmationMail', [
            'url' => [route('patients.approval', $this->schedule->id)."?is_approve=1", " ", route('patients.approval', $this->schedule->id)."?is_approve=0"],
            'message' => "Test", 
            'schedule' => $this->schedule,
        ]);
      
        return $this->to($this->schedule->patient->user->email, $this->schedule->patient->user->name);
                    // ->line('Hello Dear User!')
                    // ->line('We have noticed that the schedule you set have a conflict on our side.')
                    // ->line('We would like to change the schedule to '. Carbon::parse($this->schedule->schedule_date)->isoFormat('dddd', 'D', 'yyyy') . " " . Carbon::parse($this->schedule->schedule_time)->format('h:i:m') .' . Would you still agree?')
                    // ->action('Approve', implode([route('patients.approval', $this->schedule->id)."?is_approve=1", " ", route('patients.approval', $this->schedule->id)."?is_approve=0"]))
                    // ->line('Thank you for using our application!');
    }
}
