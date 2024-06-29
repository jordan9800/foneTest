<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationStore;
use App\Models\User;
use App\Notifications\NotificationCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $attributes = $request->all();
        if ($id) {
            $user = User::findOrFail($id);
            $userId = $user->id;
        } else {
            $user = auth()->user();
            $userId = $user->id;
        }

        $notifications = $user->notifications()
            ->when(isset($attributes['status']) && $attributes['status'] == 'read', function ($query) {
                $query->whereNotNull('read_At');
            })
            ->when(isset($attributes['status']) && $attributes['status'] == 'unread', function ($query) {
                $query->whereNull('read_At');
            })
            ->where('data->expiry_date', '>', date('Y-m-d'))->get();

        return view('admin.users.notification', ['user_id' => $userId, 'notifications' => $notifications]);
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

    public function markRead(Request $request)
    {
        $attributes = $request->all();

        if (isset($attributes['user_id'])) {
            $user = User::findOrFail($attributes['user_id']);
        } else {
            $user = auth()->user();
        }

        $notifications = $user->notifications()
            ->when(isset($attributes['notification_id']) && $attributes['notification_id'], function ($query) use ($attributes) {
                $query->where('id', $attributes['notification_id']);
            })->get();

        if ($notifications->isNotEmpty()) {
            $notifications->markAsRead();

            return redirect()->back()->withSuccess('Notification marked as read!');
        }

        return redirect()->back()->withErrors('Notification not able to mark as read!');

    }
}
