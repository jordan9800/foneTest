<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationStore;
use App\Models\Type;
use App\Models\User;
use App\Notifications\NotificationCreated;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $users = User::all();

        return view('admin.index', ['types' => $types, 'users' => $users]);
    }

    /**
     * Create new notification
     */
    public function store(NotificationStore $request)
    {
        $attributes = $request->all();

        if ($attributes['global'] == 'Yes') {
            $users = User::all();
            Notification::send($users, new NotificationCreated($attributes));

            return redirect()->back()->withSuccess('New notification created for all users successfully!');
        }

        if ($attributes['global'] == 'No') {
            $user = User::find($attributes['user']);

            Notification::send($user, new NotificationCreated($attributes));

            return redirect()->back()->withSuccess('New notification created for selected user successfully!');
        }

    }
}
