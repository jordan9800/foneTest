<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('admin.users.index')->with(['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit')->with(['user' => $user]);
    }

    public function update(ProfileUpdateRequest $request, int $id)
    {
        $attributes = $request->all();
        $user = User::findOrFail($id);
        $data = [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'notification_switch' => $attributes['notification_switch'],
        ];

        if (isset($attributes['phone'])) {
            $data['phone'] = $attributes['phone'];
        }

        if (isset($attributes['password'])) {
            $data['password'] = Hash::make($attributes['password']);
        }
        $success = $user->update($data);

        if ($success) {
            return redirect()->back()->withSuccess('Profile Updated Successfully!');
        }

        return redirect()->back()->withErrors('Profile Update Unsuccessfull!');
    }
}
