<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function all($attributes = []): Collection
    {
        $currentUserId = auth()->user()->id;

        return User::when(isset($attributes['exclude_current']), function ($query) use ($currentUserId) {
            $query->where('id', '!=', $currentUserId);
        })->get();
    }

    public function get($id): User
    {
        return User::findOrFail($id);
    }

    public function update($id, $attributes = []): bool
    {
        $user = $this->get($id);
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

        return $success ? true : false;
    }
}
