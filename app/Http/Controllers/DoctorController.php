<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Secretary;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DoctorController extends Controller
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
        $doctors = Doctor::with('user')->get();

        return view('doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['type'] = User::DOCTOR;
        $user = $this->userService->create($data);

        $user->doctor()->create([
            'specialized' => $request->specialized
        ]);

        $user->assignRole(User::DOCTOR);

        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $secretaries = Secretary::whereNull('doctor_id')->get();
        if ($doctor->secretary) {
            $secretaries->push($doctor->secretary);
        }
        return view('doctor.edit', compact('doctor', 'secretaries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, Doctor $doctor)
    {
        $this->userService->update($request->validated(), $doctor->user);

        if ($request->secretary) {
            Secretary::find($request->secretary)->update(['doctor_id' => $doctor->id]);
        }

        $doctor->update([
            'specialized' => $request->specialized
        ]);

        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return back();
    }

    public function prescription()
    {
        return view('upload-prescription');
    }
}
