<?php

namespace App\Actions\Personal\Settings;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class UpdatePasswordAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdatePasswordRequest $request)
    {
        $user = $this->userRepository->me();

        if (Hash::check($request->getPreviousPassword(), $user->password)) {
            if ($request->getNewPassword() === $request->getNewPasswordConfirmation()) {
                $user->password = Hash::make($request->getNewPassword());
                $this->userRepository->save($user);
                return redirect(route('settings'))
                    ->with('password_updated', 'Password was successfully updated!');
            }
        }

        return redirect(route('settings'))
            ->withErrors([
                'previous_password' => "Current password is wrong!"
            ]);
    }
}
