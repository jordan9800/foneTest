<?php

namespace App\Repositories;

use App\Models\User;
use App\Notifications\NotificationCreated;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function all($attributes, User $user): Collection
    {
        $notifications = $user->notifications()
            ->when(isset($attributes['status']) && $attributes['status'] == 'read', function ($query) {
                $query->whereNotNull('read_At');
            })
            ->when(isset($attributes['status']) && $attributes['status'] == 'unread', function ($query) {
                $query->whereNull('read_At');
            })
            ->where('data->expiry_date', '>', date('Y-m-d'))
            ->orderByDesc('notifications.read_at')
            ->get();

        return $notifications;

    }

    public function store($attributes = []): bool
    {
        if ($attributes['global'] == 'Yes') {
            $user = $this->userRepository->all([]);
        }

        if ($attributes['global'] == 'No') {
            $user = $this->userRepository->get($attributes['user']);
        }

        Notification::send($user, new NotificationCreated($attributes));

        return true;
    }

    public function markRead($attributes, User $user): bool
    {
        $notifications = $user->notifications()
            ->when(isset($attributes['notification_id']) && $attributes['notification_id'], function ($query) use ($attributes) {
                $query->where('id', $attributes['notification_id']);
            })->get();

        if ($notifications->isNotEmpty()) {
            $notifications->markAsRead();

            return true;
        }

        return false;
    }
}
