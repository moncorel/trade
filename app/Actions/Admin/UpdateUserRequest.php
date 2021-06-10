<?php

namespace App\Actions\Admin;

final class UpdateUserRequest
{
    private int $userId;
    private string $nickname;
    private string $email;
    private ?string $newPassword;

    public function __construct(
        int $userId,
        string $nickname,
        string $email,
        ?string $newPassword
    ) {
        $this->userId = $userId;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->newPassword = $newPassword;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }
}
