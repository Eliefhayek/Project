<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        $updatePermission = Permission::create(['name' => 'update user']);
        $deletePermission = Permission::create(['name' => 'delete user']);
        $editPermission = Permission::create(['name' => 'edit user']);

        $adminRole->syncPermissions([$updatePermission->id, $deletePermission->id, $editPermission->id]);
        $editorRole->syncPermissions([$updatePermission->id]);


    }
}
