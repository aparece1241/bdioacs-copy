<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Secretary;
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
        // data to show
        $schedules = Schedule::all();
        $patients = collect([]);
        $totalDiseases = 0;
        $totalDoctors = 0;
        $totalSecretary = 0;

        $user = request()->user();
        switch ($user->type) {
            case 'Admin':
                $patients = Patient::all()->take(5);
                $totalSecretary = Secretary::count();
                $totalDiseases =  Disease::count();
                $totalDoctors = Doctor::count();
                break;
            case 'Doctor':
                $patients = $user->doctor->schedules()->with('patient')->get()->unique(function ($item) {return $item->patient->id;});
                $schedules = $user->doctor->schedules;
                $totalDiseases =  Disease::count();
                break;
            case 'Secretary':
                if ($user->secretary->doctor) {
                    $patients = $user->secretary->doctor->schedules()->with('patient')->get()->unique(function ($item) {return $item->patient->id;});
                    $schedules = $user->secretary->doctor->schedules;
                }
                $totalDiseases = Disease::count();
                break;
            case 'Patient':
                $schedules = $user->patient->schedules;
                $totalDoctors = Doctor::all()->count();
                $totalDiseases =  Disease::count();
                break;
        }


        return view('dashboard', compact(
            'patients',
            'schedules',
            'totalDoctors',
            'totalDiseases',
            'totalSecretary',
        ));
    }
}
