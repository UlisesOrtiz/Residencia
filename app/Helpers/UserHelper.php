<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public static function userToArray(int $id)
    {
        return User::findOrFail($id)->toArray();
    }
}
