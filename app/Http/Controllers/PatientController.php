<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;

class PatientController extends Controller
{
    private $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.index');
        // $patients = Patient::with('user')->get();

        // return view('patient.index', compact('patients'));
    }

    /**
     * Calendar
     *
     * @return View
     */
    public function calendar()
    {
        $schedules = Schedule::whereMonth('schedule_date', Carbon::now()->format('m'))->get();
        $schedules = $schedules->groupBy('date');
        return view('patient.calendar', compact('schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, Patient $patient)
    {
        $this->userService->update($request->validated(), $patient->user);

        $patient->update([
            'blood_type' => $request->blood_type
        ]);

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    /**
     * View prescription
     */
    public function prescription(Schedule $schedule)
    {
        return view('prescription', compact('schedule'));
    }
}
