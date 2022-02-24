<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Notifications\AcceptScheduleNotification;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with('doctor', 'patient')->get();

        return view('schedule.index', compact('schedules'));
    }

    public function patient(Patient $patient)
    {
        $schedules = $patient->schedules;
        return view('schedule.patient', compact('schedules'));
    }

    public function approve(Schedule $schedule)
    {
        $schedule->update([
            'status' => Schedule::APPROVED
        ]);

        return back()->with('success', 'Schedule approved!');
    }

    public function accept(Schedule $schedule)
    {
        try {
            $schedule->update([
                'status' => Schedule::ACCEPTED
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('schedules.show', $schedule);
    }

    public function decline(Schedule $schedule)
    {
        $schedule->update([
            'status' => Schedule::DECLINED
        ]);

        return back()->with('sucesss', 'Schedule declined!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Doctor $doctor)
    {
        $is_physical = request()->all()['is-physical'];
        return view('schedule.create', compact('doctor', 'is_physical'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request, Doctor $doctor)
    {
        $doctor->schedules()->create($request->validated());
        return redirect()->route('users.profile', Auth::user());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        try{
            $schedule->update($request->all());
            $schedule->patient->user->notify(new AcceptScheduleNotification($schedule));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
        return redirect()->route('users.profile', Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get upload prescription view
     */
    public function prescription(Schedule $schedule)
    {
        return view('upload-prescription', compact('schedule'));
    }

    /**
     * Save images after upload
     */
    public function uploadPrescription(Request $request, Schedule $schedule)
    {
        if ($request->images) {
            $schedule->update(['images' => $request->images]);
        }

        return response(['message' => 'ok']);
    }

    /**
     * Approve page
     */
    public function approvePatient(Schedule $schedule)
    {
        $is_approve = request()->is_approve;
        if ($schedule->status != Schedule::APPROVED || $schedule->status != Schedule::DECLINED) {
            $schedule->update([
                'status' => $is_approve ? Schedule::APPROVED : Schedule::DECLINED
            ]);
        }
        return view('email.approveOrDeclined', compact('is_approve', 'schedule'));
    }
}
