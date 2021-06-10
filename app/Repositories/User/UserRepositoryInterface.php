<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function me();
    public function save(User $user): User;
    public function getUserByNickname(string $nickname): ?User;
    public function getUserByEmail(string $email): ?User;
    public function getUserById(int $id): ?User;
}
