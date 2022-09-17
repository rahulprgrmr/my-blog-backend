<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        $role = Role::where('name', config('constants.ROLES.ADMIN'))->first();
        if ($role) {
            \App\Models\User::factory()->create([
                'name' => 'Admin',
                'email' => 'rahulprgrmr@gmail.com',
                'role_id' => $role->id
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
