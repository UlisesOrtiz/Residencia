<?php

namespace App\Helpers;

use Livewire\Component;
use App\Models\User;

class EventHelper extends Component
{
    public function callConfirmationUser(int $id, string $event)
    {
        $user = self::findUser($id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $user->name,
            'id' => $user->id,
            'event' => 'event',
        ]);
    }

    public static function findUser(int $id)
    {
        return User::findOrFail($id);
    }
}
