<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class UserRepository implements UserRepositoryInterface
{
    public const DEFAULT_PAGINATE_SIZE = 10;
    public const DEFAULT_DIRECTION = 'desc';
    public const DEFAULT_SORTING = 'id';

    public function me()
    {
        return Auth::user();
    }

    public function save(User $user): User
    {
        $user->save();
        return $user;
    }

    public function getUserByNickname(string $nickname): ?User
    {
        return User::where('nickname', '=', $nickname)->first();
    }

    public function getUserByEmail(string $email): ?User
    {
        return User::where('email', '=', $email)->first();
    }

    public function getUserById(int $id): ?User
    {
        return User::findOrFail($id);
    }
}
