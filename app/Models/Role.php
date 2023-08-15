<?php

namespace App\Models;

use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    protected $fillable = [
        'id',
        'name',
        'guard_name',
    ];

    const ROOT = 'Root';
    const ADMIN = 'Admin';
    const USER = 'User';

    public static function defaultRoles()
    {
        return [
            'Root', 'Admin', 'User'
        ];
    }
}
