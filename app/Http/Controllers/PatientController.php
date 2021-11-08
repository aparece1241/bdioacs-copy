<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Patient;
use App\Services\UserService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with('user')->get();

        return view('patient.index', compact('patients'));
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
}
