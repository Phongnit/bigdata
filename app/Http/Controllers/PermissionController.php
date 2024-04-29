<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function addper(Request $request, $role_id)
    {
        $permissions = $request->input('permissions');

        foreach ($permissions as $permissionId) {
            // DB::table('table_role_per')->insert([
            //     'role_id' => $role_id,
            //     'per_id' => $permissionId
            // ]);
            $existingRecord = DB::table('table_role_per')
                ->where('role_id', $role_id)
                ->where('per_id', $permissionId)
                ->exists();

            if (!$existingRecord) {
                DB::table('table_role_per')->insert([
                    'role_id' => $role_id,
                    'per_id' => $permissionId
                ]);
            }
        }

        // Xử lý logic sau khi lưu thành công

        return redirect()->route('roles.index');
    }
}
