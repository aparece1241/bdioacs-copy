@extends('layouts.app')

@section('breadcrums')
<li class="breadcrumb-item active" aria-current="page">Profile</li>
@endsection

@section('content')
<div class="container">
    <div class="card px-5 pb-3">
        <div class="card-body px-0 pt-4">
            <h4>Set Week Schedule</h4>
            <form method="post" id="form" action="{{ route('secretaries.update-schedule', $secretary) }}">
                @csrf
                <table class="table border">
                    <tr class="border">
                        <td class="border border-left">Date</td>
                        <td class="border border-left">Set Schedule</td>
                    </tr>
                    @foreach($week as $key => $day)
                    <tr class="border">
                        <td class="border border-left">
                            {{ $day->format('M d, Y (D)') }}
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"
                                                aria-hidden="true"></i></span>
                                    </div>
                                   <select name="schedule_doctor" id="" class="form-control">
                                       <option value="">Set Availability</option>
                                       @foreach (['available', 'not available'] as $item)
                                           @if($item == $schedule[$key])
                                           <option value="{{ $item }}" selected>{{ ucfirst($item) }}</option>
                                           @else
                                           <option value="{{ $item }}">{{ ucfirst($item) }}</option>
                                           @endif
                                       @endforeach
                                   </select>
                                    @error('schedule_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <input type="hidden" name="schedule" id="schedule" value="">
            </form>
            <button type="button" onclick="submit()" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                Change
            </button>
        </div>
    </div>
</div>
<script>
    function submit() {
        let schedule_val = [];
        var schedule = document.getElementsByName('schedule_doctor');
        let form = document.getElementById('form');
        let inputHidden = document.getElementById('schedule');

        Array.from(schedule).forEach(sched => {
            schedule_val.push(sched.value);
        });
        inputHidden.value = JSON.stringify(schedule_val);
        form.submit()
}
</script>
@endsection