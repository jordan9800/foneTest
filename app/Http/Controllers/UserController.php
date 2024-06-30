<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function index()
    {
        $attributes = [
            'exclude_current' => true,
        ];
        $users = $this->userRepository->all($attributes);

        return view('admin.users.index')->with(['users' => $users]);
    }

    public function edit($id)
    {
        $user = $this->userRepository->get($id);

        return view('admin.users.edit')->with(['user' => $user]);
    }

    public function update(ProfileUpdateRequest $request, int $id)
    {
        $success = $this->userRepository->update($id, $request->all());

        if ($success) {
            return redirect()->back()->withSuccess('Profile Updated Successfully!');
        }

        return redirect()->back()->withErrors('Profile Update Unsuccessfull!');
    }
}
