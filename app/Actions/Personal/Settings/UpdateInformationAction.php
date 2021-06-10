<?php

namespace App\Actions\Personal\Settings;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class UpdateInformationAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateInformationRequest $request)
    {
        $isChanged = false;
        $user = $this->userRepository->me();

        if ($request->getNickname() !== $user->nickname) {
            if ($this->userRepository->getUserByNickname($request->getNickname())) {
                return redirect(route('settings'))->withErrors([
                    'nickname' => "User with such nickname already exists!"
                ]);
            }
            $user->nickname = $request->getNickname();
            $isChanged = true;
        }

        if ($request->getAvatar()) {
            if ($user->nickname) {
                Storage::delete(User::AVATAR_PATH . '/' . $user->nickname);
            }
            $path = Storage::putFile(User::AVATAR_PATH, $request->getAvatar());
            $user->avatar = Str::replaceFirst(User::AVATAR_PATH . '/', '', $path);
            $isChanged = true;
        }
        $this->userRepository->save($user);

        if ($isChanged) {
            return redirect(route('settings'))->with([
                'settings_updated' => 'Information was successfully updated!'
            ]);
        }
    }
}
