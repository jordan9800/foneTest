<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function all($attributes = []): Collection;

    public function get(int $id): ?User;

    public function update(int $id, $attributes = []): bool;
}
