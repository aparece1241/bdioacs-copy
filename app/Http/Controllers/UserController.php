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
    public function __construct(private UserService $userService)
    {
    }
    public function profile(User $user)
    {
        $schedules = $user->type == User::DOCTOR
            ? $user->doctor?->schedules
            : $user->patient?->schedules;

        if (!$schedules) {
            $schedules = [];
        }

        $meetings = $user->type == User::DOCTOR
            ? $user->doctor?->meetings
            : $user->patient?->meetings;
        if (!$meetings) {
            $meetings = [];
        }

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
