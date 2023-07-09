<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleService
{
    /**
     * Cadastra ou atualiza o registro
     */
    public function updateOrCreate(array $request, int $id = null): Role
    {
        DB::beginTransaction();

        try {
            $data = ['name' => $request['name']];

            $role = Role::updateOrCreate(['id' => $id], $data);

            $role->permissions()->sync($request['permissions'] ?? []);

            DB::commit();

            return $role;
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     */
    public function delete(Role $role): void
    {
        DB::beginTransaction();

        try {
            $role->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
