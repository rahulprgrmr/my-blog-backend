<?php

namespace App\Repositories;

use App\Models\Role;

class Roles
{
    public static function getAuthorRole()
    {
        return Role::where('name', config('constants.ROLES.AUTHOR'))->first();
    }
}
