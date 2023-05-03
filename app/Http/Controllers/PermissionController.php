<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    //
    public function perm(){
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        $updatePermission = Permission::create(['name' => 'update user']);
        $deletePermission = Permission::create(['name' => 'delete user']);
        $editPermission = Permission::create(['name' => 'edit user']);

        $adminRole->syncPermissions([$updatePermission->id, $deletePermission->id, $editPermission->id]);
        $editorRole->syncPermissions([$updatePermission->id]);
    }
}
