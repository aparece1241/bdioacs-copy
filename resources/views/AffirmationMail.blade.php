@component('mail::message')
# Hello

Hello Dear User!

We have noticed that the schedule you set have a conflict on our side.
We would like to change the schedule to {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('Y-m-d') }}  {{ \Carbon\Carbon::parse($schedule->schedule_time)->format('H:i A') }}.Would you still agree?

<!-- Custom Button -->
<div class="d-grid" style="grid-template-columns: 1fr 1fr; justify-content:center; align-content:center;">
    <a href="{{ $url[0] }}" class="button button-success" target="_blank" rel="noopener">Approve</a>
    <a href="{{ $url[1] }}" class="button button-primary" target="_blank" rel="noopener">Decline</a>
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
