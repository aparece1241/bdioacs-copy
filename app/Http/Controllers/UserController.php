<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\FileService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function profile(User $user)
    {
        // User must be the authenticated
        $user = request()->user();
        $meetings = [];
        $schedules = [];

        switch ($user->type) {
            case User::PATIENT:
                $schedules = ($user->patient) ? $user->patient->schedules : collect([]);
                $meetings = ($user->patient) ? $user->patient->meetings : collect([]);
                break;
            case User::DOCTOR:
                $schedules = ($user->doctor) ? $user->doctor->schedules : collect([]);
                $meetings = ($user->doctor) ? $user->doctor->meetings : collect([]);
                break;
            case User::SECRETARY:
                $secretary = ($user->secretary) ? $user->secretary : null;
                $schedules = ($secretary->doctor) ? $secretary->doctor->schedules : collect([]);
                $meetings = ($secretary->doctor) ? $secretary->doctor->meetings : collect([]);
        }

        $meetings = !$meetings ? [] : $meetings;
        $schedules = !$schedules ? [] : $schedules;
        return view('profile', compact('user', 'schedules', 'meetings'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->hasFile('profile')) {
            $data['profile'] = FileService::getBaseImageUrl($request->file('profile'));
        }
        $this->userService->update($data, $user);

        return back();
    }

    public function updatePassword(PasswordRequest $request, User $user)
    {
        $this->userService->updatePassword($request->validated(), $user);

        return back();
    }
}
