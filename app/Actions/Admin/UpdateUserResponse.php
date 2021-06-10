<?php

namespace App\Actions\Admin;

final class UpdateUserResponse
{
    private bool $updated;

    public function __construct(bool $updated)
    {
        $this->updated = $updated;
    }

    public function isUpdated(): bool
    {
        return $this->updated;
    }
}
