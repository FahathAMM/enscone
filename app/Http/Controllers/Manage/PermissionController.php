<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    // protected $model;
    private $permissions;

    public function __construct(User $model)
    {
        $this->model       = $model;
        $this->permissions = Permission::all();
    }

    public function index()
    {
        return view('manage.permission.index', [
            'roles'  => Role::latest()->get(),
            'tittle' => 'Permission',
        ]);
    }

    public function permissionView($id)
    {
        return view('manage.permission.view', [
            'tittle'      => 'permissionView',
            'role'        => Role::find($id),
            'permissions' => $this->permissions,
        ]);
    }

    public function createRole(Request $request)
    {

        $request->validate([
            'role' => 'required',
        ]);

        Role::create(['name' => $request->input('role')]);

        return redirect(route('permission.index'))->with('success', 'created success');
    }

    public function setPermissionToRole(Role $role, Request $request)
    {

        $role->permissions()->detach();

        $role->givePermissionTo($request->permission);

        $users = User::role($role->name)->get();

        foreach ($users as $user) {
            $user->permissions()->detach();
            $user->givePermissionTo($request->permission);
        }

        return redirect(route('permission.index'))->with('success', 'created success');

        $role->givePermissionTo($request->only(['read', 'write', 'read_write', 'delete', 'both']));

    }

    public function setRolesToUser(User $user, Request $request)
    {
        $user->assignRole($request->role);

        return redirect(route('user.list'))->with('success', 'success');

    }

    public function removeRoleFromUser(User $user, $role, Request $request)
    {
        $user->roles()->detach($role);

        return redirect(route('user.list'))->with('success', 'Remove success');

    }

    public function userList()
    {

        return view('manage.permission.users', [
            'users' => User::latest()->paginate(10),
            'roles' => Role::latest()->get(),
        ]);

    }

    public function viewUsers(Role $role, Request $request)
    {

        // return $user = User::select('id', 'name')->get();
        return view('manage.permission.user_view', [
            'users'    => User::role($role->name)->get(),
            'allUsers' => User::select('id', 'name')->get(),
            'role'     => $role->name,
        ]);

        // $user->assignRole('writer');

    }

}
