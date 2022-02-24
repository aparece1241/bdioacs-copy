<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Schedule;
use Carbon\Carbon;

class AcceptScheduleNotification extends Notification
{
    use Queueable;

    protected $schedule;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
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
        return (new MailMessage)
                    ->line('Hello Dear User!')
                    ->line('We have noticed that the schedule you set have a conflict on our side.')
                    ->line('We would like to change the schedule to '. Carbon::parse($this->schedule->schedule_date)->isoFormat('dddd', 'D', 'yyyy') . " " . Carbon::parse($this->schedule->schedule_time)->format('h:i:m') .' . Would you still agree?')
                    ->action('Approve', implode([route('patients.approval', $this->schedule->id)."?is_approve=1", " ", route('patients.approval', $this->schedule->id)."?is_approve=0"]))
                    ->line('Thank you for using our application!');
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
