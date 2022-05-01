<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Models\Doctor;
use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function index()
    {
        return Meeting::all();
    }

    public function meetings(User $user)
    {
    }

    public function create(Doctor $doctor, Schedule $schedule)
    {
        return view('meeting.create', compact('doctor', 'schedule'));
    }

    public function store(MeetingRequest $request, Doctor $doctor)
    {
        $doctor->meetings()->create($request->validated());

        return redirect()->route('users.profile', Auth::user());
    }

    public function show(Meeting $meeting)
    {
        return view('meeting.show', compact('meeting'));
    }
}
