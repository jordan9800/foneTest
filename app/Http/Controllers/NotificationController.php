<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationStore;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private NotificationRepositoryInterface $notificationRepository
    ) {}

    public function index(Request $request, $id = null)
    {
        if ($id) {
            $user = $this->userRepository->get($id);
            $userId = $user->id;
        } else {
            $user = auth()->user();
            $userId = $user->id;
        }

        $notifications = $this->notificationRepository->all($request->all(), $user);

        if ($request->ajax()) {
            return response()->json(['notifications' => $notifications]);
        }

        return view('admin.users.notification', ['user_id' => $userId, 'notifications' => $notifications]);
    }

    /**
     * Create new notification
     */
    public function store(NotificationStore $request)
    {
        $attributes = $request->all();
        $success = $this->notificationRepository->store($attributes);

        if ($success) {
            if ($attributes['global'] == 'Yes') {
                return redirect()->back()->withSuccess('New notification created for all users successfully!');
            }

            if ($attributes['global'] == 'No') {
                return redirect()->back()->withSuccess('New notification created for selected user successfully!');
            }
        }
    }

    /**
     * Mark notification as read
     */
    public function markRead(Request $request)
    {
        $attributes = $request->all();

        if (isset($attributes['user_id'])) {
            $user = $this->userRepository->get($attributes['user_id']);
        } else {
            $user = auth()->user();
        }

        $success = $this->notificationRepository->markRead($attributes, $user);

        if ($success) {
            return redirect()->back()->withSuccess('Notification marked as read!');
        }

        return redirect()->back()->withErrors('Notification not able to mark as read!');

    }
}
