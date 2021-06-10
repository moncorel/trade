<?php

namespace App\Actions\Personal\Settings;

use Illuminate\Http\UploadedFile;

final class UpdateInformationRequest
{
    private ?string $nickname;
    private ?UploadedFile $avatar;

    public function __construct(?string $nickname, ?UploadedFile $avatar)
    {
        $this->nickname = $nickname;
        $this->avatar = $avatar;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function getAvatar(): ?UploadedFile
    {
        return $this->avatar;
    }
}
