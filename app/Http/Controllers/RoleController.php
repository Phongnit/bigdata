<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        $role_per = RolePer::all();
        return view('roles.create', compact('permission', 'role_per'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = new Role();
        $roles->name = $request->name;
        $roles->role_id = $request->role_id;
        $roles->save();

        return redirect()->route('roles.edit',$roles->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('roles.user');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $string = DB::table('table_role')
            ->join('table_role_per', 'table_role.id', '=', 'table_role_per.role_id')
            ->join('table_permission', 'table_role_per.per_id', '=', 'table_permission.id')
            ->select('table_permission.id')
            ->where('table_role.id', $id)
            ->get()->toArray();
            $selectedPermissions = array_column($string, 'id');
            // dd($selectedPermissions);

        $roles = Role::find($id);
        $permission = Permission::all();
        return view('roles.edit', compact('roles', 'permission', 'selectedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        RolePer::where('role_id',$id)->delete();
        $permissions = $request->input('permissions');

        foreach ($permissions as $permissionId) {
            // DB::table('table_role_per')->insert([
            //     'role_id' => $role_id,
            //     'per_id' => $permissionId
            // ]);
            $existingRecord = DB::table('table_role_per')
                ->where('role_id', $id)
                ->where('per_id', $permissionId)
                ->exists();

            if (!$existingRecord) {
                DB::table('table_role_per')->insert([
                    'role_id' => $id,
                    'per_id' => $permissionId
                ]);
            }
        }
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
