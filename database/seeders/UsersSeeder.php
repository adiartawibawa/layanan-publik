<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::findByName(Role::USER);

        User::factory()->count(50)->create(['current_role_id' => $role->id])->each(function ($user) {
            $user->assignRole(Role::USER);
        });
    }
}
