<?php

namespace Fjord\Permissions\Controllers;

use Fjord\Permissions\Models\RolePermission;
use Fjord\Permissions\Requests\RolePermission\UpdateRolePermissionRequest;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;

class RolePermissionController
{
    public function update(UpdateRolePermissionRequest $request)
    {
        $role = Role::findOrFail($request->role['id']);

        if ($role->hasPermissionTo($request->permission)) {
            $role->revokePermissionTo($request->permission);
        } else {
            $role->givePermissionTo($request->permission);
        }

        Cache::forget('spatie.permission.cache');

        return RolePermission::all();
    }
}
