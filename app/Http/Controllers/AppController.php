<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patients = Patient::all()->take(5);
        $totalSecretary = Secretary::count();
        $totalDiseases =  Disease::count();
        $totalDoctors = Doctor::count();
        return view('dashboard', compact(
            'patients',
            'totalSchedules',
            'totalDiseases',
            'totalDoctors'
        ));
    }
}
