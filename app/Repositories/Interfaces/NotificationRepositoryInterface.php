<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface NotificationRepositoryInterface
{
    public function all($attributes, User $user): Collection;

    public function store($attributes = []): bool;

    public function markRead($attributes, User $user): bool;
}
