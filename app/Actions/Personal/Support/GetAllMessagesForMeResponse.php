<?php

namespace App\Actions\Personal\Support;

use Illuminate\Support\Collection;

final class GetAllMessagesForMeResponse
{
    private Collection $messages;

    public function __construct(Collection $messages)
    {
        $this->messages = $messages;
    }

    public function getMessages(): Collection
    {
        return $this->messages;
    }
}
