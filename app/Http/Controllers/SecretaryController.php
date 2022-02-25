<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Models\Secretary;
use App\Models\User;
use Carbon\Carbon;

class SecretaryController extends Controller
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
        $secretaries = Secretary::with('user')->get();
        return view('secretary.index', compact('secretaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretary.create');
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
        $data['type'] = User::SECRETARY;
        $user = $this->userService->create($data);

        $user->secretary()->create([
            'user_id' => $user
        ]);

        $user->assignRole(User::SECRETARY);

        return redirect()->route('secretaries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Secretary $secretary)
    {
        return view('secretary.edit', compact('secretary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, Secretary $secretary)
    {
        $this->userService->update($request->validated(), $secretary->user);
        return redirect()->route('secretaries.index');
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
     * Add doctor schedule
     * 
     * @return \Illuminate\Http\Response
     */
    public function setDoctorSchedule(Secretary $secretary)
    {
        // get week days
        $week = [];
        $now = Carbon::now();
        $weekStartDay = $now->startOfWeek();
        array_push($week, $weekStartDay);
        
        for ($n = 0;6 > $n; $n++) {
            $d = Carbon::parse($weekStartDay)->addDay();
            $weekStartDay = $d;
            array_push($week, $d);
        }
        return view('secretary.setDoctorSchedule', compact('week', 'secretary'));
    }

    /**
     * Update doctor schedule
     * 
     * @return redirect
     */

     public function updateDoctorSchedule(Request $request, Secretary $secretary)
     {
        $secretary->doctor->update($request->all());
        return redirect()->route('secretaries.set-schedule', $secretary);
     }
}
