<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::put('users/{user}/password', [UserController::class, 'updatePassword'])->name('users.update-password');
    Route::resource('patients', PatientController::class);
    Route::get('patients/{patient}/schedules', [ScheduleController::class, 'patient'])->name('patients.schedules.index');
    Route::resource('doctors', DoctorController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::get('doctors/{doctor}/schedules', [ScheduleController::class, 'create'])->name('doctors.schedules.create');
    Route::post('doctors/{doctor}/schedules', [ScheduleController::class, 'store'])->name('doctors.schedules.store');
    Route::put('schedules/{schedule}/accept', [ScheduleController::class, 'accept'])->name('schedules.accept');
    Route::put('schedules/{schedule}/decline', [ScheduleController::class, 'decline'])->name('schedules.decline');
    Route::resource('doctors.feedback', FeedbackController::class)->shallow();
    Route::get('users/{user}/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::resource('diseases', DiseaseController::class);
    Route::get('doctors/{doctor}/diseases/create', [DiseaseController::class, 'create'])->name('doctors.diseases.create');
    Route::post('doctors/{doctor}/diseases', [DiseaseController::class, 'store'])->name('doctors.diseases.store');
    Route::get('doctors/{doctor}/schedules/{schedule}/meetings', [MeetingController::class, 'create'])->name('meetings.create');
    Route::post('doctors/{doctor}/meetings', [MeetingController::class, 'store'])->name('meetings.store');
    Route::get('meetings/{meeting}', [MeetingController::class, 'show'])->name('meetings.show');
});



Auth::routes([
    'login'    => false,
]);

