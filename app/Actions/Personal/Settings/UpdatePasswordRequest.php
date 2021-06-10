<?php

namespace App\Actions\Personal\Settings;

final class UpdatePasswordRequest
{
    private string $previousPassword;
    private string $newPassword;
    private string $newPasswordConfirmation;

    public function __construct(
        string $previousPassword,
        string $newPassword,
        string $newPasswordConfirmation
    ) {
        $this->previousPassword = $previousPassword;
        $this->newPassword = $newPassword;
        $this->newPasswordConfirmation = $newPasswordConfirmation;
    }

    public function getPreviousPassword(): string
    {
        return $this->previousPassword;
    }

    public function getNewPassword(): string
    {
        return $this->newPassword;
    }

    public function getNewPasswordConfirmation(): string
    {
        return $this->newPasswordConfirmation;
    }
}
