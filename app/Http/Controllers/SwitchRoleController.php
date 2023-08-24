<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SwitchRoleController extends Controller
{
    public function __invoke(Role $role)
    {
        abort_unless(auth()->user()->hasRole($role), 404);

        auth()->user()->update(['current_role_id' => $role->id]);

        return to_route(Auth::user()->getRedirectRoute()); // Replace this with your own home route
    }
}
