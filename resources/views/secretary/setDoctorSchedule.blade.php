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
                    @foreach($week as $day)
                    <tr class="border">
                        <td class=" border border-left">
                            {{ $day->format('M d, Y') }}
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="schedule_date">Set Schedule</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"
                                                aria-hidden="true"></i></span>
                                    </div>
                                   <select name="schedule_doctor" id="" class="form-control">
                                       <option value="">Set Availability</option>
                                       <option value="available">Available</option>
                                       <option value="not available">Not Available</option>
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
                <button type="button" onclick="submit()" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                    Change
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
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
    }
</script>
@endsection