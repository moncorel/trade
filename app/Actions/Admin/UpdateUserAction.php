<?php

namespace App\Actions\Admin;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class UpdateUserAction
{
    private bool $updated = false;
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateUserRequest $request)
    {
        $user = $this->userRepository->getUserById($request->getUserId());

        if ($user->nickname !== $request->getNickname()) {
            if (!$this->userRepository->getUserByNickname($request->getNickname())) {
                $user->nickname = $request->getNickname();
                $this->userRepository->save($user);
                $this->updated = true;
            } else {
                throw ValidationException::withMessages([
                    'nickname' => "User with such nickname already exists!"
                ]);
            }
        }

        if ($user->email !== $request->getEmail()) {
            if (!$this->userRepository->getUserByEmail($request->getEmail())) {
                $user->email = $request->getEmail();
                $this->userRepository->save($user);
                $this->updated = true;
            } else {
                throw ValidationException::withMessages([
                    'email' => "User with such email already exists!"
                ]);
            }
        }

        if ($request->getNewPassword()) {
            $user->password = Hash::make($request->getNewPassword());
            $this->userRepository->save($user);
            $this->updated = true;
        }

        return new UpdateUserResponse($this->updated);
    }
}
