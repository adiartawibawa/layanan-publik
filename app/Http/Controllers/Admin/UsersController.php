<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{

    protected $data = [];
    protected $perPage = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roleToFilter = Role::ROOT;

        $users = User::whereDoesntHave('roles', function ($query) use ($roleToFilter) {
            $query->where('name', $roleToFilter);
        })
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->orderBy('roles.name', 'asc')
            ->select('users.*')
            ->paginate($this->perPage);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['roleId'] = null;

        return view('admin.users.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => 'nullable|boolean',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($data['is_admin']) {
            $user->assignRole(Role::ADMIN);
        } else {
            $user->assignRole(Role::USER);
        }

        $user->update(['current_role_id' => $user->roles->first()->id]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['user'] = User::findOrFail($id);

        return view('admin.user.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $this->data['user'] = $user;
        $this->data['roles'] = Role::all()->pluck('name', 'id');
        $this->data['roleId'] = $user->roles->first() ? $user->roles->first()->id : null;

        return view('admin.users.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => 'nullable|boolean',
        ]);

        $user = User::findOrFail($id);

        if (!$data['password']) {
            unset($data['password']);
        }

        $user->update($data);

        if ($data['is_admin']) {
            $user->syncRoles(Role::ADMIN);
        } else {
            $user->syncRoles(Role::USER);
        }

        $user->update(['current_role_id' => $user->roles->first()->id]);

        return Redirect::route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->user()->id) {
            return redirect('admin/users')
                ->with('error', 'Could not delete yourself.');
        }

        if ($user->hasRole(\App\Models\Role::ADMIN)) {
            return redirect('admin/users')
                ->with('error', 'Could not delete the admin user.');
        }

        if ($user->delete($id)) {
            return redirect('admin/users')
                ->with('success', __('users.success_deleted_message', ['name' => $user->name]));
        }

        return redirect()->route('admin.users.index')->with('error', __('users.fail_to_delete_message', ['name' => $user->name]));
    }
}
